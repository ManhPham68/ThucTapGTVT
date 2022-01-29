<?php
namespace App\Traits;//dùng trong soft delete
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpload($request,$fielName,$folderName){
        if($request->hasFile($fielName)){
            $file = $request->$fielName;
            $fileNameOrigin = $file ->getClientOriginalName();// lấy tên file khi upload lên
            $fileNameHash = Str::random(20) . '.' .$file->getClientOriginalExtension();
            $filePath = $request->file($fielName)->storeAs('public/'.$folderName, $fileNameHash);
            $dataUploadTrait=[
                'file_name'=>$fileNameOrigin,
                "file_path"=>Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        else return null;


    }
    public function storageTraitUploadMutiple($file,$folderName){

            $fileNameOrigin = $file ->getClientOriginalName();
            $fileNameHash = Str::random(20) . '.' .$file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'.$folderName, $fileNameHash);
            $dataUploadTrait=[
                'file_name'=>$fileNameOrigin,
                "file_path"=>Storage::url($filePath)
            ];
            return $dataUploadTrait;




    }

}
