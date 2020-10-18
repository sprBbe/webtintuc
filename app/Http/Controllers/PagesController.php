<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    function tintuc($id) {
        $tintuc = TinTuc::find($id);
        //$tintuc->SoLuotXem=$tintuc->SoLuotXem+1;
        $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        DB::table('TinTuc')->where('id', $id)->update(['SoLuotXem' => $tintuc->SoLuotXem+1]);
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan]);
    }
}
