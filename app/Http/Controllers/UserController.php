<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $title='Danh sách người dùng';
        $obj=new User();
        $list=$obj->loadList();
        return view('user.index',compact('title','list'));
    }
}
