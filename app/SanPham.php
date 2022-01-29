<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use SoftDeletes;
    protected $guarded=[];

    public function images()
    {
        return $this->hasMany(AnhSanPham::class,'san_pham_id');
    }
    public function catagory(){
        return $this->belongsTo(LoaiSanPham::class,'loai_san_pham_id');
    }
    public function creator(){
        return $this->belongsTo(HangSanXuat::class,'hang_san_xuat_id');
    }
}
