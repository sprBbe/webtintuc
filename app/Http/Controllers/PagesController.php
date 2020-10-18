<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{TheLoai, Slide,TinTuc,LoaiTin};

class PagesController extends Controller
{
    //
    function __construct()
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
    }

    function trangchu(){
        $bon_tinnoibat = TinTuc::where('NoiBat',1)->orderby('id','desc')->take(4)->get();
        return view('pages.trangchu',['bon_tinnoibat'=>$bon_tinnoibat]);
    }
}
