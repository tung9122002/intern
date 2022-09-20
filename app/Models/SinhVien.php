<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SinhVien extends Model
{
    use HasFactory;
    protected $table='sinhvien';
    protected $fillable=['ten_sv','nam_sinh','email','dia_chi'];
    public function list(){

        $list=DB::table('sinhvien')
        // ->join('role',function($join){
        //     $join->on('sinhvien.role_id','=','role.id')
        //     ->where('sinhvien.id','>',4);
        // })
        ->join('role','role.id','=','sinhvien.role_id')
        // ->crossJoin('sinhvien')
        ->select('sinhvien.*','role.ten_role')
        // ->whereNull()
        ->get();
        return $list;
    }

}
