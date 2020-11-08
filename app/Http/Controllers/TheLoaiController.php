<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $minutes = 2000*60;
    public function index()
    {
        if (Cache::has('theloai_index')) {
            $theloai = Cache::get('theloai_index');
        }
        else {
            $theloai = TheLoai::all();
            Cache::put('theloai_index', $theloai , $this->minutes);
        }
        //$theloai = TheLoai::all();
        return view('admin.theloai.danhsach', ['theloai' => $theloai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.them');
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
                'Ten' => 'required|unique:TheLoai,Ten|min:2|max:100'
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên thể loại!',
                'Ten.unique' => 'Tên Thể Loại đã tồn tại!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
            ]
        );
        $theloai = new TheLoai;
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();Cache::forget('theloai_index');
        return redirect('admin/theloai/create')->with('thongbao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function show(TheLoai $theLoai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua', ['theloai' => $theloai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $theloai = TheLoai::find($id);
        $this->validate(
            $request,
            [
                'Ten' => 'required|unique:TheLoai,Ten|min:2|max:100'
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên thể loại!',
                'Ten.unique' => 'Tên Thể Loại đã tồn tại hoặc chưa được sửa!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
            ]
        );
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();Cache::forget('theloai_index');
        return redirect('admin/theloai/' . $id.'/edit')->with('thongbao', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai')->with('thongbao', 'Xoá thành công!');
    }
}
