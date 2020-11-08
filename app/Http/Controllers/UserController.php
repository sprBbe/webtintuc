<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $minutes = 2000*60;
    public function index()
    {
        if (Cache::has('user_index')) {
            $user = Cache::get('user_index');
        }
        else {
            $user = User::all();
            Cache::put('user_index', $user , $this->minutes);
        }
        return view('admin.user.danhsach', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.them');
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
                'Email' => 'required|unique:users,email',
                'Password'=>'required|min:6|max:30',
                'PasswordAgain'=>'required|same:Password',
                'Quyen'=> 'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên người dùng!',
                'Email.required' => 'Bạn chưa nhập email người dùng!',
                'Email.unique' => 'Email người dùng đã tồn tại!',
                'Quyen.required' => 'Bạn chưa chọn quyền người dùng!',
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
        $user->password = bcrypt($request->Password);
        $user->quyen = $request->Quyen;
        $user->save();
        Cache::forget('user_index');
        return redirect('admin/user/create')->with('thongbao', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.user.sua',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $this->validate(
            $request,
            [
                'Ten' => 'required|min:2|max:100',
                'Quyen'=> 'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập tên người dùng!',
                'Quyen.required' => 'Bạn chưa chọn quyền người dùng!',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 2 đến 100 ký tự!',
            ]
        );
        $user->name = $request->Ten;
        $user->quyen = $request->Quyen;
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
        Cache::forget('user_index');
        return redirect('admin/user/'.$id.'/edit')->with('thongbao', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with('thongbao', 'Xoá người dùng thành công!');
    }

    public function getdangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postdangnhapAdmin(Request $request)
    {
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
            return redirect('admin/theloai');
        }
        else{
            return redirect('admin/login')->with('canhbao', 'Đăng nhập không thành công!');
        }
    }
    public function getdangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
