<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "Comment";
    public function tintuc(){
        return $this->belongsTo('App\Models\TinTuc','idTinTuc','id');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','idUser','id');
    }
}
