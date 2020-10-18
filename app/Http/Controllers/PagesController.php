<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use App\Models\{TheLoai, Slide,TinTuc,LoaiTin};
=======
use App\Models\{Comment, TheLoai, Slide,TinTuc,LoaiTin};
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Carbon\Carbon;
>>>>>>> 213bc51047f58b87feb9c7fa6aef6b26aaa5e349

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
        $loaitin1 = TinTuc::where('idLoaiTin', 1)->orderby('id','desc')->take(4)->get();
        $loaitin2 = TinTuc::where('idLoaiTin', 2)->orderby('id','desc')->take(3)->get();
        $loaitin3 = TinTuc::where('idLoaiTin', 3)->orderby('id','desc')->take(3)->get();
        $loaitin4 = TinTuc::where('idLoaiTin', 4)->orderby('id','desc')->take(3)->get();
        $trending = TinTuc::where('id','>', DB::table('TinTuc')->max('id') - 50)->orderby('SoLuotXem','desc')->take(4)->get();
        $tinmoinhat = TinTuc::orderby('id','desc')->take(3)->get();
        $binhluan = Comment::orderby('id','desc')->take(4)->get();
        return view('pages.trangchu',['bon_tinnoibat'=>$bon_tinnoibat, 'loaitin1'=>$loaitin1,
        'loaitin2'=>$loaitin2,'loaitin3'=>$loaitin3,'loaitin4'=>$loaitin4,'tinmoinhat'=>$tinmoinhat,
        'trending'=>$trending,'binhluan'=>$binhluan]
        );
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
