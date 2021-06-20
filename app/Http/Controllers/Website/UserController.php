<?php

namespace App\Http\Controllers\Website;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function login(){ 
        return view('website.login');
    }
    public function signup(){ 
        return view('website.signup');
    }
    public function createuser(Request $request) {
        $username   = $request->username;
        $email      = $request->email;
        $password   = $request->password;

        $password = Hash::make($password);
    
        $user = new User();
        $user->username = $username;
        $user->email    = $email;
        $user->password = $password;
        $user->save();
        $message = 'Đăng ký thành công, đăng nhập bằng tài khoản vừa tạo.';
        $request->session()->flash('success', $message);
        return view('website.login');
    }
    public function checklogin(Request $request){ 
        // $email = $request->email;
        // $password   = $request->password;
        // $credentials = [
        //     'email' => $email,
        //     'password' => $password
        // ];

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
           
            return redirect()->route('Home');
        }else{
            $message = 'Đăng nhập không thành công!';
            $request->session()->flash('fail-login', $message);
            return redirect()->route('Login');
        }
    }
}
