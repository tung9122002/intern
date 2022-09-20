<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable=['color','size','coupon_number','order_item.coupon_id','order.trang_thai','order_item.total_pr','customer.email','quantity','gia_thitruong','location_district.name_district','location_province.name_province','customer.address','customer.province_id','customer.district_id','total','order.order_id','order.id','customer.name','product_id','total','order.created_at','order.updated_at','quanly_sp.ten_sp','order_item.customer_id'];
    public function loadList(){
        $query=DB::table('order')
        ->join('quanly_sp','quanly_sp.id','=','order.product_id')
        ->join('order_item','order_item.id','=','order.order_id')
        ->join('customer','order_item.customer_id','=','customer.id')
            ->join('location_province','location_province.id','=','customer.province_id')
            ->join('location_district','location_district.id','=','customer.district_id')
//            ->select($this->fillable)
            ->select('customer.id','customer.name','location_province.name_province','location_district.name_district','customer.address','quantity','total','order.created_at','order.updated_at','order.order_id',
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(total) as total')
            )
            ->groupBy('order.order_id')
        ->get();
//        dd($query);
        return $query;
    }
    public function addOrderItem($params){
        $query=DB::table('order_item')
        ->insertGetId($params);
        return $query;
    }
    public function addOrder($params){
        $query=DB::table('order')
        ->insert($params);
        return $query;
    }
    public function deleteOrder($id){
        $delete=DB::table('order')
        ->delete($id);
        return $delete;
    }
    public function getOrderItem(){
        $query=DB::table('order_item')
            ->get();
        return $query;
    }
    public function editOne($id){
        $query=DB::table('order')
            ->find($id);
            return $query;
    }
    public function loadOne($id){
        $query=DB::table('order')
            ->join('quanly_sp','quanly_sp.id','=','order.product_id')
            ->join('order_item','order_item.id','=','order.order_id')
            ->join('customer','customer.id','=','order_item.customer_id')
            ->join('location_province','location_province.id','=','customer.province_id')
            ->join('location_district','location_district.id','=','customer.district_id')
            ->leftJoin('coupons','coupons.id','=','order_item.coupon_id')
//            ->rightJoin('product_attributes','product_attributes.id_product','=','quanly_sp.id')
            ->where('order_id','LIKE','%'.$id.'%')
            ->select($this->fillable)
            ->get();
//        dd($query);
        return $query;
    }
//    public function coupon(){
//        $query=DB::table('coupons')
//            ->leftJoin('order_item','order_item.coupon_id','=','coupons.id')
//            ->get('coupons.*');
//        return $query;
//    }
    public function updateOrder($id,$params=[]){
        $data=$params;
        $res=DB::table('order')
            ->where('id',$id)
            ->update($data);
        return $res;
    }
    public function historyOrderId($id){
        $query=DB::table('order')
            ->join('quanly_sp','quanly_sp.id','=','order.product_id')
            ->join('order_item','order_item.id','=','order.order_id')
            ->join('customer','customer.id','=','order_item.customer_id')
            ->join('users','users.id','=','customer.id_user')
            ->join('location_province','location_province.id','=','customer.province_id')
            ->join('location_district','location_district.id','=','customer.district_id')
            ->where('id_user',$id)
            ->groupBy('order.order_id')
            ->select('order.created_at','customer.name','customer.email','customer.address','location_district.name_district','location_province.name_province','order.trang_thai','order.order_id','order.id'
                ,DB::raw('SUM(order.total) as total')
                ,DB::raw('SUM(order.quantity) as quantity')
            )
//            ->havingRaw('SUM(order.total) >?',[100])
                ->orderBy('created_at','DESC')
            ->get();
//        dd($query);
        return $query;
    }

}
