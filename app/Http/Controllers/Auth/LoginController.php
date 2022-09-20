<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
//        dd($request->all());
        $rules=[
            'email'=>'required|email',
            'password'=>'required',
        ];
        $message=[
            'email.required'=>'Bạn phải nhập vào gmail',
            'password.required'=>'Bạn phải nhập vào password'
        ];
        $validator= Validator::make($request->all(),$rules,$message);
        if ($validator->fails()){
            return redirect('login')->withErrors($validator);
        }
        else{
            $email=$request->input('email');
            $password=$request->input('password');
            if (Auth::attempt(['email'=>$email,'password'=>$password])){
                return redirect()->route('productList');
            }
            else{
                Session::flash('error','Email hoặc mật khẩu không đúng');
                return redirect('login');
            }
        }

    }
    public function logOut(){
        Auth::logout();
        return redirect('login');
    }
}
