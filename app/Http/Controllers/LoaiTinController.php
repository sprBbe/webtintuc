<?php

namespace App\Http\Controllers;

use App\Models\{LoaiTin, TheLoai};
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cache::has('loaitin_index')) {
            $loaitin = Cache::get('loaitin_index');
        }
        else {
            $loaitin = LoaiTin::all();
            Cache::put('loaitin_index', $loaitin , 2000*60);
        }
        return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        return view('admin.loaitin.them', ['theloai' => $theloai]);
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
                'Ten' => 'required|unique:LoaiTin,Ten|min:2|max:100',
                'TheLoai' => 'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại tin!',
                'Ten.unique' => 'Tên loại tin đã tồn tại!',
                'Ten.min' => 'Tên loại tin phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên loại tin phải có độ dài từ 2 đến 100 ký tự!',
                'Theloai.required' => 'Bạn chưa chọn thể loại!',
            ]
        );
        $loaitin = new LoaiTin();
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();Cache::forget('loaitin_index');
        return redirect('admin/loaitin/create')->with('thongbao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiTin  $loaiTin
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiTin $loaiTin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiTin  $loaiTin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::find($id);
        return view('admin.loaitin.sua', ['loaitin' => $loaitin], ['theloai' => $theloai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoaiTin  $loaiTin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loaitin = LoaiTin::find($id);
        $this->validate(
            $request,
            [
                'Ten' => 'required|unique:LoaiTin,Ten|min:2|max:100',
                'TheLoai' => 'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên loại tin!',
                'Ten.unique' => 'Tên loại tin đã tồn tại!',
                'Ten.min' => 'Tên loại tin phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên loại tin phải có độ dài từ 2 đến 100 ký tự!',
                'Theloai.required' => 'Bạn chưa chọn thể loại!',
            ]
        );
        $loaitin->Ten = $request->Ten;
        $loaitin->TenKhongDau = changeTitle($request->Ten);
        $loaitin->idTheLoai = $request->TheLoai;
        $loaitin->save();Cache::forget('loaitin_index');Cache::forget('ajax_loaitin'.$loaitin->idTheLoai );
        return redirect('admin/loaitin/' . $id.'/edit')->with('thongbao', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiTin  $loaiTin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin')->with('thongbao', 'Xoá thành công!');
    }
}
