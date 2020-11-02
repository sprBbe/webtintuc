<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\{TheLoai, Slide,TinTuc,LoaiTin,Comment, User};
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public $minutes = 2000*60;
    function __construct()
    {
        if (Cache::has('theloai')) {
            $theloai = Cache::get('theloai', 'default');
        } else {
            $theloai = TheLoai::all();
            Cache::put('theloai', $theloai, $this->minutes);
        }
        view()->share('theloai',$theloai);
    }
    function trangchu(){
        if (Cache::has('Pages_trangchu_bon_tinnoibat')) {
            $bon_tinnoibat = Cache::get('Pages_trangchu_bon_tinnoibat', 'default');
        } else {
            $bon_tinnoibat = TinTuc::where('NoiBat', 1)->orderby('id','desc')->take(4)->get();
            Cache::put('Pages_trangchu_bon_tinnoibat', $bon_tinnoibat, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_loaitin1')) {
            $loaitin1 = Cache::get('Pages_trangchu_loaitin1', 'default');
        } else {
            $loaitin1 = TinTuc::where('idLoaiTin', 1)->orderby('id','desc')->take(4)->get();
            Cache::put('Pages_trangchu_loaitin1', $loaitin1, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_loaitin2')) {
            $loaitin2 = Cache::get('Pages_trangchu_loaitin2', 'default');
        } else {
            $loaitin2 = TinTuc::where('idLoaiTin', 2)->orderby('id','desc')->take(3)->get();
            Cache::put('Pages_trangchu_loaitin2', $loaitin2, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_loaitin3')) {
            $loaitin3 = Cache::get('Pages_trangchu_loaitin3', 'default');
        } else {
            $loaitin3 = TinTuc::where('idLoaiTin', 3)->orderby('id','desc')->take(3)->get();
            Cache::put('Pages_trangchu_loaitin3', $loaitin3, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_loaitin4')) {
            $loaitin4 = Cache::get('Pages_trangchu_loaitin4', 'default');
        } else {
            $loaitin4 = TinTuc::where('idLoaiTin', 4)->orderby('id','desc')->take(3)->get();
            Cache::put('Pages_trangchu_loaitin4', $loaitin4, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_trending')) {
            $trending = Cache::get('Pages_trangchu_trending', 'default');
        } else {
            $trending = TinTuc::where('id','>', DB::table('TinTuc')->max('id') - 50)->orderby('SoLuotXem','desc')->take(4)->get();
            Cache::put('Pages_trangchu_trending', $trending, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_tinmoinhat')) {
            $tinmoinhat = Cache::get('Pages_trangchu_tinmoinhat', 'default');
        } else {
            $tinmoinhat = TinTuc::orderby('id','desc')->take(3)->get();
            Cache::put('Pages_trangchu_tinmoinhat', $tinmoinhat, $this->minutes);
        }

        if (Cache::has('Pages_trangchu_binhluan')) {
            $binhluan = Cache::get('Pages_trangchu_binhluan', 'default');
        } else {
            $binhluan = Comment::orderby('id','desc')->take(4)->get();
            Cache::put('Pages_trangchu_binhluan', $binhluan, $this->minutes);
        }
        if (Cache::has('slide')) {
            $slide = Cache::get('slide', 'default');
        } else {
            $slide = Slide::all();
            Cache::put('slide', $slide, $this->minutes);
        }
        return view('pages.trangchu',['bon_tinnoibat'=>$bon_tinnoibat, 'loaitin1'=>$loaitin1,
        'loaitin2'=>$loaitin2,'loaitin3'=>$loaitin3,'loaitin4'=>$loaitin4,'tinmoinhat'=>$tinmoinhat,
        'trending'=>$trending,'binhluan'=>$binhluan,'slide'=>$slide]
        );
    }

    function tintuc($id) {
        if (Cache::has('Pages_tintuc_tintuc_'.$id)) {
            $tintuc = Cache::get('Pages_tintuc_tintuc_'.$id , 'default');
        } else {
            $tintuc = TinTuc::find($id);
            Cache::put('Pages_tintuc_tintuc_'.$id, $tintuc, $this->minutes);
        }

        if (Cache::has('Pages_tintuc_tinlienquan')) {
            $tinlienquan = Cache::get('Pages_tintuc_tinlienquan', 'default');
        } else {
            $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->orderby('id', 'desc')->take(5)->get();
            Cache::put('Pages_tintuc_tinlienquan', $tinlienquan, $this->minutes);
        }
        DB::table('TinTuc')->where('id', $id)->update(['SoLuotXem' => $tintuc->SoLuotXem+1]);
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinlienquan'=>$tinlienquan]);
    }

    function loaitin($id){
        if (Cache::has('Pages_loaitin_loaitin_'.$id)) {
            $loaitin = Cache::get('Pages_loaitin_loaitin_'.$id, 'default');
        } else {
            $loaitin = LoaiTin::find($id);
            Cache::put('Pages_loaitin_loaitin_'.$id, $loaitin, $this->minutes);
        }

        if (Cache::has('Pages_loaitin_tintuc')) {
            $tintuc = Cache::get('Pages_loaitin_tintuc', 'default');
        } else {
            $tintuc = TinTuc::where('idLoaiTin',$id)->orderby('id','desc')->paginate(5);
            Cache::put('Pages_loaitin_tintuc', $tintuc, $this->minutes);
        }

        if (Cache::has('Pages_tinnoibat')) {
            $tinnoibat = Cache::get('Pages_tinnoibat', 'default');
        } else {
            $tinnoibat = TinTuc::where('NoiBat',1)->orderby('id','desc')->take(4)->get();
            Cache::put('Pages_tinnoibat', $tinnoibat, $this->minutes);
        }
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat]);
    }

    function tinnoibat() {
        if (Cache::has('Pages_tinnoibat_tinnoibat')) {
            $tinnoibat = Cache::get('Pages_tinnoibat_tinnoibat', 'default');
        } else {
            $tinnoibat = TinTuc::where('NoiBat',1)->orderby('id','desc')->take(10)->get();
            Cache::put('Pages_tinnoibat_tinnoibat', $tinnoibat, $this->minutes);
        }

        return view('pages.tinnoibat', ['tinnoibat'=>$tinnoibat]);
    }

    function getTimKiem(Request $request){
        $tukhoa=$request->get('TimKiem');
        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->
        orwhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(5);
        $tinnoibat = TinTuc::where('NoiBat',1)->orderby('id','desc')->take(4)->get();
        return view('pages.timkiem',['tintuc'=>$tintuc,'tukhoa'=>$tukhoa,'tinnoibat'=>$tinnoibat]);
    }
    function getTrending(){
        if (Cache::has('Pages_trending_trending')) {
            $trending = Cache::get('Pages_trending_trending', 'default');
        } else {
            $trending = TinTuc::where('id','>', DB::table('TinTuc')->max('id') - 50)->orderby('SoLuotXem','desc')->take(10)->get();
            Cache::put('Pages_trending_trending', $trending, $this->minutes);
        }

        if (Cache::has('Pages_tinnoibat')) {
            $tinnoibat = Cache::get('Pages_tinnoibat', 'default');
        } else {
            $tinnoibat = TinTuc::where('NoiBat',1)->orderby('id','desc')->take(4)->get();
            Cache::put('Pages_tinnoibat', $tinnoibat, $this->minutes);
        }


        return view('pages.trending',['trending'=>$trending,'tinnoibat'=>$tinnoibat]);
    }
    function getnewest_cmt(){
        if (Cache::has('Pages_trending_newest_cmt')) {
            $newest_cmt = Cache::get('Pages_trending_newest_cmt', 'default');
        } else {
            $newest_cmt = Comment::orderby('id','desc')->take(4)->get();
            Cache::put('Pages_trending_newest_cmt', $newest_cmt, $this->minutes);
        }

        if (Cache::has('Pages_tinnoibat')) {
            $tinnoibat = Cache::get('Pages_tinnoibat', 'default');
        } else {
            $tinnoibat = TinTuc::where('NoiBat',1)->orderby('id','desc')->take(4)->get();
            Cache::put('Pages_tinnoibat', $tinnoibat, $this->minutes);
        }
        return view('pages.newest_cmt',['newest_cmt'=>$newest_cmt,'tinnoibat'=>$tinnoibat]);
    }
    function getLogin(){
        return view('pages.dangnhap');
    }
    function getRegister(){
        return view('pages.dangky');
    }
    function postLogin(Request $request){
        $this->validate(
            $request,
            [
                'Email' => 'required',
                'Password'=>'required|min:6|max:30',
            ],
            [
                'Email.required' => 'Bạn chưa nhập email người dùng!',
                'Password.required' => 'Bạn chưa nhập mật khẩu!',
                'Password.min' => 'Mật khẩu phải có độ dài từ 6 đến 30 ký tự!',
                'Password.max' => 'Mật khẩu phải có độ dài từ 6 đến 30 ký tự!',
            ]
        );

        if(Auth::attempt(['email' => $request->Email, 'password' => $request->Password])){
            return redirect('trangchu');
        }
        else{
            return redirect('login')->with('canhbao', 'Đăng nhập không thành công!');
        }
    }
    function postRegister(Request $request){
        $this->validate(
            $request,
            [
                'Ten' => 'required|min:2|max:100',
                'Password'=>'required|min:6|max:30',
                'PasswordAgain'=>'required|same:Password',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên người dùng!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Password.required' => 'Bạn chưa nhập mật khẩu!',
                'Password.min' => 'Mật khẩu phải có độ dài từ 6 đến 30 ký tự!',
                'Password.max' => 'Mật khẩu phải có độ dài từ 6 đến 30 ký tự!',
                'PasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu!',
                'PasswordAgain.same' => 'Mật khẩu nhập lại không khớp!',
            ]
        );
        $user = new User();
        $user->name = $request->Ten;
        $user->email = $request->Email;
        $user->quyen = 0;
        $user->password = bcrypt($request->Password);
        $user->save();
        return redirect('register')->with('thongbao', 'Đăng ký thành công!');
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('trangchu');
    }
    function postbinhluan(Request $request, $id){
        $comment = new Comment();
        $comment->idTinTuc = $id;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->Binhluan;
        $comment->save();
        return redirect('tintuc/'.$id.'/'.$comment->tintuc->TieuDeKhongDau.'.html')->with('thongbao', 'Thêm bình luận thành công!');
    }

    function getnguoidung(){
        return view('pages.nguoidung');
    }
    function postnguoidung(Request $request){
        $user = User::find(Auth::user()->id);
        $this->validate(
            $request,
            [
                'Ten' => 'required|min:2|max:100',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên người dùng!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
            ]
        );
        $user->name = $request->Ten;
        if($request->changepassword == "on"){
            $this->validate(
                $request,
                [
                    'Password'=>'required|min:6|max:30',
                    'PasswordAgain'=>'required|same:Password',
                ],
                [
                    'Password.required' => 'Bạn chưa nhập mật khẩu!',
                    'Password.min' => 'Mật khẩu phải có độ dài từ 6 đến 30 ký tự!',
                    'Password.max' => 'Mật khẩu phải có độ dài từ 6 đến 30 ký tự!',
                    'PasswordAgain.required' => 'Bạn chưa nhập lại mật khẩu!',
                    'PasswordAgain.same' => 'Mật khẩu nhập lại không khớp!',
                ]
            );
            $user->password = bcrypt($request->Password);
        }
        $user->save();
        return redirect('user')->with('thongbao', 'Sửa thông tin thành công!');
    }
}
