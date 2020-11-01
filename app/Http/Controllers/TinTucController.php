<?php

namespace App\Http\Controllers;

use App\Models\{TinTuc,LoaiTin,TheLoai};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cache::has('tintuc_index')) {
            $tintuc = Cache::get('tintuc_index');
        }
        else {
            $tintuc = TinTuc::orderBy('id','desc')->get();
            Cache::put('tintuc_index', $tintuc , 2000*60);
        }
        return view('admin.tintuc.danhsach', ['tintuc' => $tintuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them', ['theloai' => $theloai], ['loaitin' => $loaitin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'TomTat' => 'required',
                'TieuDe' => 'required|unique:TinTuc,TieuDe|min:2|max:100',
                'LoaiTin' => 'required',
                'NoiDung' => 'required',
                'Hinh' => 'mimes:jpeg,jpg,png,raw',
            ],
            [
                'TomTat.required' => 'Bạn chưa nhập Tóm Tắt tin!',
                'TieuDe.required' => 'Bạn chưa nhập Tiêu Đề tin!',
                'TieuDe.unique' => 'Tiêu Đề tin đã tồn tại!',
                'TieuDe.min' => 'Tiêu Đề tin phải có độ dài từ 2 đến 100 ký tự!',
                'TieuDe.max' => 'Tiêu Đề tin phải có độ dài từ 2 đến 100 ký tự!',
                'LoaiTin.required' => 'Bạn chưa chọn Loại Tin!',
                'NoiDung.required' => 'Bạn chưa nhập Nội Dung tin!',
                'Hinh.mimes'=> 'Bạn không chọn đúng định dạng ảnh!'
            ]
        );
        $tintuc = new TinTuc();
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->SoLuotXem = 0;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc/",$Hinh);
            $tintuc->Hinh = $Hinh; 
        }else{
            $tintuc->Hinh=""; 
        }
        $tintuc->save();
        return redirect('admin/tintuc/create')->with('thongbao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $theloai = TheLoai::all();
        $tintuc= TinTuc::find($id);
        $loaitin = LoaiTin::where('idTheLoai',$tintuc->loaitin->idTheLoai)->get();
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai' => $theloai,'loaitin' => $loaitin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tintuc = TinTuc::find($id);
        $this->validate(
            $request,
            [
                'TomTat' => 'required',
                'TieuDe' => 'required|min:2|max:100',
                'LoaiTin' => 'required',
                'NoiDung' => 'required',
                'Hinh' => 'mimes:jpeg,jpg,png,raw',
            ],
            [
                'TomTat.required' => 'Bạn chưa nhập Tóm Tắt tin!',
                'TieuDe.required' => 'Bạn chưa nhập Tiêu Đề tin!',
                'TieuDe.min' => 'Tiêu Đề tin phải có độ dài từ 2 đến 100 ký tự!',
                'TieuDe.max' => 'Tiêu Đề tin phải có độ dài từ 2 đến 100 ký tự!',
                'LoaiTin.required' => 'Bạn chưa chọn Loại Tin!',
                'NoiDung.required' => 'Bạn chưa nhập Nội Dung tin!',
                'Hinh.mimes'=> 'Bạn không chọn đúng định dạng ảnh!',
            ]
        );
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc/",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh; 
        }
        $tintuc->save();
        return redirect('admin/tintuc/'.$id.'/edit')->with('thongbao', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TinTuc  $tinTuc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->delete();
        return redirect('admin/tintuc')->with('thongbao', 'Xoá thành công!');
    }
}
