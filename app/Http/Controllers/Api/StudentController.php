<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function sinhvien(Request $request){
        $rules=[
            'ten_sv'=>'required',
            'nam_sinh'=>'required',
            'email'=>'required|string|unique:sinhvien',
            'dia_chi'=>'required|string',
        ];
        // $validator=Validator::make($request->all(),$rules);
        $sinhvien=new SinhVien([
            'ten_sv'=>$request->input('ten_sv'),
            'nam_sinh'=>$request->input('nam_sinh'),
            'email'=>$request->input('email'),
            'dia_chi'=>$request->input('dia_chi'),
            'role_id'=>$request->input('role_id'),
        ]);
        $sinhvien->save();
        return response()->json([
            'status'=>'success'
        ]);
    }
    public function index(){
        $data=new SinhVien();
        $sinhvien=$data->list()->toArray();
        return response()->json($sinhvien);
    }
}
