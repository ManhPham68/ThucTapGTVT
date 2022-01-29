<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;

    /**
     * AdminSliderController constructor.
     * @param $slider
     */
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function trangchu(){
        $sliders= $this->slider->get();
        return view('admins.sliders.trangchu',compact('sliders'));
    }
    public function themmoi(){
        return view('admins.sliders.themmoi');
    }
    public function themmoi_gui(Request $request){

        try {
            DB::beginTransaction();
            $dataProduct=[
                'name' => $request->name,
                'description' => $request->des,//lấy từ form
            ];

            $dataUploadImage = $this->storageTraitUpload($request,'image','slider');
            if(!empty($dataUploadImage)){
                $dataProduct['image_path']=$dataUploadImage['file_path'];
                $dataProduct['image_name']=$dataUploadImage['file_name'];
            }
            $this->slider->create($dataProduct);
            DB::commit();
            session()->flash('success', 'Thêm mới thành công');
            return redirect()->route("sliders.trangchu");

        }   catch(Exception $exception){
            DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
        }


    }
    public function sua($id){
        $sliders=$this->slider->find($id);
        return view('admins.sliders.sua',compact('sliders'));
    }
    public function sua_gui(Request $request,$id){
        try {
            DB::beginTransaction();
            $dataProduct=[
                'name' => $request->name,
                'description' => $request->des,//lấy từ form
            ];

            $dataUploadImage = $this->storageTraitUpload($request,'image','slider');
            if(!empty($dataUploadImage)){
                $dataProduct['image_path']=$dataUploadImage['file_path'];
                $dataProduct['image_name']=$dataUploadImage['file_name'];
            }
            $this->slider->find($id)->update($dataProduct);
            DB::commit();
            session()->flash('success', 'Sửa thành công');
            return redirect()->route("sliders.trangchu");

        }   catch(Exception $exception){
            DB::rollBack();
            Log::error('Messege : ' . $exception->getMessage() . 'line : ' . $exception->getLine());
        }
    }
    public function xoa($id){
        try {
            $this->slider->find($id)->delete();
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
