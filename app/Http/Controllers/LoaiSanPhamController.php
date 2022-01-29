<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\LoaiSanPham;
use App\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class LoaiSanPhamController extends Controller
{
    private $loai_sp;

    /**
     * LoaiSanPhamController constructor.
     * @param $loai_sp
     */
    public function __construct(LoaiSanPham $loai_sp)
    {
        $this->loai_sp = $loai_sp;
    }

    public function themmoi()
    {
        return view('admins.loaisanpham.themmoi');
    }
    public function trangchu()
    {
        $loai_sps = $this->loai_sp->orderBy('id','asc')->get();
        return view('admins.loaisanpham.trangchu', compact('loai_sps', $loai_sps))->with('i', (request()->input('page', 1) - 1) * 3);
    }
    public function themmoi_gui(Request $request)
    {
        $loaisp = new LoaiSanPham();
        $loaisp->ten_loaisp = $request->ten_loaisp;
        $loaisp->save();
        session()->flash('success', 'Thêm mới thành công');
        return redirect()->route('loaisanphams.trangchu');
    }

    public function sua($id)
    {
        $loai_sp = DB::table('loai_san_phams')->find($id);
        return view('admins.loaisanpham.sua', compact('loai_sp'));
    }
    public function sua_gui(Request $request, $id)
    {
        $loai_sp = LoaiSanPham::findOrFail($id);
        $loai_sp->ten_loaisp = $request->ten_loaisp;
        $loai_sp->update();
        session()->flash('success', 'Sửa thành công');
        return redirect()->route('loaisanphams.trangchu');
    }
    public function xoa($id)
    {
        $sanphams = SanPham::where('loai_san_pham_id',($id))->count();
            if($sanphams > 0){
                return Redirect::to('admin/loaisanphams')
                    ->with('message', 'Something went wrong');
            }else {
                try {
                    $this->loai_sp->find($id)->delete();
                    return response()->json([
                        'code' => 200,
                        'message' => 'success'
                    ], 200);

                } catch (Exception $exception) {
                    Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
                    return response()->json([
                        'code' => 500,
                        'message' => 'fail'
                    ], 500);
                }
                }
            }
}
