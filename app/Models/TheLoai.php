<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $table = "theloai";
    public function loaitin(){
        return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }
    public function tintuc(){
        return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
