<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HangSanXuat extends Model
{
    use SoftDeletes;
    protected $fillable = ['ten_hangsx', 'thong_tin'];
}
