<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShippingFee extends Model
{
    use HasFactory;
    public function loadList($id){
        $query=DB::table('shipping_fee')
            ->where('province_id',$id)
            ->first();
        return $query;
    }
    public function ShipList(){
        $list=DB::table('shipping_fee')
            ->join('location_province','location_province.id','=','shipping_fee.province_id')
            ->select('shipping_fee.id','location_province.name_province','shipping_fee.update_at','fee')
            ->get();
        return $list;
    }
    public function saveNew($params){
        $query=DB::table('shipping_fee')
            ->insertGetId($params);
        return $query;
    }
    public function loadOne($id,$params=[]){
        $query=DB::table('shipping_fee')
            ->where('id',$id)
            ->first();
        return $query;
    }
    public function saveUpdate($id,$params=[]){
        $data=$params;
        $query=DB::table('shipping_fee')
            ->where('id',$id)
            ->update($data);
        return $query;
    }
    public function deleteShip($id){
        $delete=DB::table('shipping_fee')
            ->delete($id);
        return $delete;
    }
}
