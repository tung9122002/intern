<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Province extends Model
{
    use HasFactory;
    public function listProvinceShip(){
        $query=DB::table('location_province')
            ->leftJoin('shipping_fee','shipping_fee.province_id','=','location_province.id')
            ->where('shipping_fee.province_id',null)
            ->select('location_province.id','location_province.name_province')
            ->get();
//        dd($query);
        return $query;
    }
    public function listProvince(){
        $query=DB::table('location_province')
            ->get();
        return $query;
    }
}
