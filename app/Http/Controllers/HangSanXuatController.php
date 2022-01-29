<?php

namespace App\Http\Controllers;


use App\HangSanXuat;
use App\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\This;


class HangSanXuatController extends Controller
{
    private $hangsx;

    /**
     * HangSanXuatController constructor.
     * @param $hangsx
     */
    public function __construct(HangSanXuat $hangsx)
    {
        $this->hangsx = $hangsx;
    }

    public function themmoi()
    {
        return view('admins.hangsanxuat.themmoi');
    }
    public function trangchu()
    {
        $hang_sxs = HangSanXuat::all();
        return view('admins.hangsanxuat.trangchu', compact('hang_sxs', $hang_sxs))->with('i', (request()->input('page', 1) - 1) * 3);
    }
    public function themmoi_gui(Request $request)
    {
        $hang_sx = new HangSanXuat();
        $hang_sx->ten_hangsx = $request->ten_hangsx;
        $hang_sx->thong_tin = $request->thong_tin;
        $hang_sx->save();
        session()->flash('success', 'Thêm mới thành công');
        return redirect()->route('hangsanxuats.trangchu');
    }

    public function sua($id)
    {
        $hang_sx = DB::table('hang_san_xuats')->find($id);
        return view('admins.hangsanxuat.sua', compact('hang_sx'));
    }
    public function sua_gui(Request $request, $id)
    {
        try{
            DB::beginTransaction();
            $dataProductUpdate=[
                'ten_hangsx' => $request->ten_hangsx,
                'thong_tin' => $request->thong_tin
            ];
            $this->hangsx->find($id)->update($dataProductUpdate);
            DB::commit();
        session()->flash('success', 'Sửa thành công');
        return redirect()->route('hangsanxuats.trangchu');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
        }

    }
    public function xoa($id){
        try {
            $sanphams = SanPham::where('hang_san_xuat_id',($id))->count();
            if($sanphams > 0){
                return Redirect::to('admin/hangsanxuats')
                    ->with('message', 'Something went wrong');
            }
            $this->hangsx->find($id)->delete();
            return response()->json([
                'code'=>200,
                'message'=>'success'
            ],200);

        }catch(Exception $exception){
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'
            ],500);
        }
    }
}
