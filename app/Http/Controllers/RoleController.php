<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function addRole(Request $request){
        $role=new Role([
            'ten_role'=>$request->input('ten_role'),
            'mo_ta'=>$request->input('mo_ta'),
        ]);
        $role->save();
        return response()->json([
            'status'=>'success'
        ]);
    }
}
