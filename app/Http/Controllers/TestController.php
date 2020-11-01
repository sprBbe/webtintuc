<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\{TheLoai, Slide,TinTuc,LoaiTin,Comment, User};

class TestController extends Controller
{
    public function test()
    {
        if (Cache::has('theloai')) {
            $theloai = Cache::get('theloai', 'default');
        } else {
            $theloai = TheLoai::all();
            Cache::put('theloai', $theloai, 1);
        }
        if (Cache::has('slide')) {
            $slide = Cache::get('slide', 'default');
        } else {
            $slide = Slide::all();
            Cache::put('slide', $slide, 1);
        }
        echo $theloai;
        echo "\n";
        echo $slide;
    }
}
