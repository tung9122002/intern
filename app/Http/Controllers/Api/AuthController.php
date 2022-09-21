<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $rules=[
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>'falis',
                'error'=>$validator->errors()->toArray(),
            ]);
        }
        $user=new User([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);
        $user->save();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
