<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    use HasFactory;
    protected $table = "LoaiTin";
    public function theloai(){
        return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }
    public function tintuc(){
        return $this->hasMany('App\TinTuc','idLoaiTin','id');
    }
}
