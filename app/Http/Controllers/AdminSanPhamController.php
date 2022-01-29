<?php

namespace App\Http\Controllers;

use App\AnhSanPham;
use App\HangSanXuat;
use App\Http\Requests\ProductAddRequest;
use App\LoaiSanPham;
use App\SanPham;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\This;


class AdminSanPhamController extends Controller
{
    use StorageImageTrait;
    private $sanpham;
    private $anhSanPham;

    /**
     * AdminSanPhamController constructor.
     * @param $sanpham
     */
    public function __construct(SanPham $sanpham,AnhSanPham $anhSanPham)
    {
        $this->sanpham = $sanpham;
        $this->anhSanPham = $anhSanPham;

    }

    public function trangchu(){
        $sanphams= $this->sanpham->get();
      return view('admins.sanpham.trangchu',compact('sanphams'));
    }
    public function themmoi(){
        $loai_sp = LoaiSanPham::all();
        $hang_sx=HangSanXuat::all();
        return view('admins.sanpham.themmoi')->with(['loai_sp' => $loai_sp, 'hang_sx' => $hang_sx]);
    }
    public function themmoi_gui (ProductAddRequest $request){
      try{
          DB::beginTransaction();
          $dataProduct=[
              'ten_sp' => $request->ten_sp,
              'gia_nhap_sp' => $request->gia_nhap_sp,//lấy từ form
              'gia_ban_sp' => $request->gia_ban_sp,
              'trang_thai'=>$request->trang_thai,
              'thong_tin_sp'=>$request->thong_tin_sp,
              'hang_san_xuat_id'=> $request->hang_sx,
              'loai_san_pham_id'=>$request->loai_sp,

          ];

          $dataUploadImage = $this->storageTraitUpload($request,'anh_sp','sanpham');
          if(!empty($dataUploadImage)){
              $dataProduct['anh_sp']=$dataUploadImage['file_path'];
          }
          $sanphams=$this->sanpham->create($dataProduct);
          //them data vào bảng ảnh sp
          if($request->hasFile('link')){
              foreach ($request->link as $fileItem){
                  $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem,'sanpham');
                  /*  AnhSanPham::create([
                       'san_pham_id'=>$sanphams->id,
                        'Link'=>$dataProductImageDetail['file_path']
                    ]); CÁCH 1*/
                  /* $this->anhSanPham->create([
                       'san_pham_id'=>$sanphams->id,
                       'Link'=>$dataProductImageDetail['file_path']
                   ]); cach2*/

                  $sanphams->images()->create([
                      'Link'=>$dataProductImageDetail['file_path']
                  ]);
              }
          }
           DB::commit();
          session()->flash('success', 'Thêm mới thành công');
          return redirect()->route('sanphams.trangchu');
      }catch(Exception $exception){
          DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
      }

    }
    public function sua($id){
        $sanphams=$this->sanpham->find($id);
        $loai_sp_selected = LoaiSanPham::find($sanphams->loai_san_pham_id);
        $hang_sx_selected = HangSanXuat::find($sanphams->hang_san_xuat_id);
        $loai_sp = LoaiSanPham::all();
        $hang_sx=HangSanXuat::all();
        return view('admins.sanpham.sua',compact('sanphams','loai_sp_selected','hang_sx_selected'))->with(['loai_sp' => $loai_sp, 'hang_sx' => $hang_sx]);
    }
    public function sua_gui(Request $request,$id){
        try{
            DB::beginTransaction();
            $dataProductUpdate=[
                'ten_sp' => $request->ten_sp,
                'gia_nhap_sp' => $request->gia_nhap_sp,//lấy từ form
                'gia_ban_sp' => $request->gia_ban_sp,
                'trang_thai'=>$request->trang_thai,
                'thong_tin_sp'=>$request->thong_tin_sp,
                'hang_san_xuat_id'=> $request->hang_sx,
                'loai_san_pham_id'=>$request->loai_sp,

            ];

            $dataUploadImage = $this->storageTraitUpload($request,'anh_sp','sanpham');
            if(!empty($dataUploadImage)){
                $dataProductUpdate['anh_sp']=$dataUploadImage['file_path'];
            }
           $this->sanpham->find($id)->update($dataProductUpdate);
            $sanphams=$this->sanpham->find($id);
            //them data vào bảng ảnh sp
            if($request->hasFile('link')){
                $this->anhSanPham->where('san_pham_id',$id)->delete();
                foreach ($request->link as $fileItem){
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem,'sanpham');
                    $sanphams->images()->create([
                        'Link'=>$dataProductImageDetail['file_path']
                    ]);
                }
            }
            DB::commit();
            session()->flash('success', 'Sửa thành công');
            return redirect()->route('sanphams.trangchu');
        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
        }
    }
    public function xoa($id){
        try {
            $this->sanpham->find($id)->delete();
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
    public function chitiet($id){
       $sanphams=$this->sanpham->find($id);
        $loai_sp_selected = LoaiSanPham::find($sanphams->loai_san_pham_id);
        $hang_sx_selected = HangSanXuat::find($sanphams->hang_san_xuat_id);
        $loai_sp = LoaiSanPham::all();
        $hang_sx=HangSanXuat::all();
        return view('admins.sanpham.chitiet',compact('sanphams','loai_sp_selected','hang_sx_selected'))->with(['loai_sp' => $loai_sp, 'hang_sx' => $hang_sx]);

    }

    //add to cart
    public function cart()
    {
        return view('admins.sanpham.cart');
    }
    public function addToCart($id)
    {
        $product = SanPham::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->ten_sp,
                "quantity" => 1,
                "price" => $product->gia_ban_sp,
                "image" => $product->anh_sp
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm mới giỏ hàng thành công');
    }
    public function updatecart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Đã cập nhật lại giỏ hàng');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Xóa giỏ hàng thành công');
        }
    }
}
