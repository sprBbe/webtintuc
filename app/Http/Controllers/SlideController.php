<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slide = Slide::all();
        return view('admin.slide.danhsach', ['slide' => $slide]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.slide.them');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(
            $request,
            [
                'Ten' => 'required|min:2|max:100',
                'NoiDung' => 'required',
                'Hinh' => 'mimes:jpeg,jpg,png,raw',
                'Link' => 'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên Slide!',
                'NoiDung.required' => 'Bạn chưa nhập nội dung Slide!',
                'Link.required' => 'Bạn chưa nhập link Slide!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Hinh.mimes'=> 'Bạn không chọn đúng định dạng ảnh!',
            ]
        );
        $slide = new Slide();
        $slide->Ten = $request->Ten;
        $slide->link = $request->Link;
        $slide->NoiDung = $request->NoiDung;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/slide/".$Hinh)){
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/slide/",$Hinh);
            $slide->Hinh = $Hinh;
        }else{
            $slide->Hinh="";
        }
        $slide->save();
        return redirect('admin/slide/create')->with('thongbao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $slide = Slide::find($id);
        return view('admin.slide.sua', ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $slide =  Slide::find($id);
        $this->validate(
            $request,
            [
                'Ten' => 'required|min:2|max:100',
                'NoiDung' => 'required',
                'Hinh' => 'mimes:jpeg,jpg,png,raw',
                'Link' => 'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên Slide!',
                'NoiDung.required' => 'Bạn chưa nhập nội dung Slide!',
                'Link.required' => 'Bạn chưa nhập link Slide!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Hinh.mimes'=> 'Bạn không chọn đúng định dạng ảnh!',
            ]
        );
        $slide->Ten = $request->Ten;
        $slide->link = $request->Link;
        $slide->NoiDung = $request->NoiDung;
        if($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/slide/".$Hinh)){
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/slide/",$Hinh);
            unlink("upload/slide/".$slide->Hinh);
            $slide->Hinh = $Hinh;
        }
        $slide->save();
        return redirect('admin/slide/' . $id.'/edit')->with('thongbao', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slide = Slide::find($id);
        $slide->delete();
        return redirect('admin/slide')->with('thongbao', 'Xoá thành công!');
    }
}
