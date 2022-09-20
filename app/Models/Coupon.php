<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class Coupon extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function listCoupon($couponCode){
        $now=Carbon::now()->toDateTimeString();
        $query=DB::table('coupons')
            ->where('coupon_code',$couponCode)
//            ->where('status',0)
            ->where('coupon_date_end','>=',$now)
            ->first();
        return $query;
    }
    public function listCou(){
        $listCoupon=DB::table('coupons')
            ->get();
        return $listCoupon;
    }
    public function saveNew($params){
        $query=$params;
        $coupon_code=$params['coupon_code'].'_ozawa123';
//        dd($coupon_code);
        if ($params['coupon_date_start']<$params['coupon_date_end']){
//            dd(1);
            $query=DB::table('coupons')
                ->insertGetId([
                    'coupon_name'=>$params['coupon_name'],
                    'coupon_code'=>$coupon_code,
                    'coupon_number'=>$params['coupon_number'],
                    'coupon_date_start'=>$params['coupon_date_start'],
                    'coupon_date_end'=>$params['coupon_date_end'],
                    'amount'=>$params['amount'],
                ]);
//        dd($query);
            return $query;
        }
        else{
            \Illuminate\Support\Facades\Session::flash('error','Ngày không đúng');
            return redirect('coupon.add_coupon');
        }
    }
    public function loadOne($id){
        $query=DB::table('coupons')
            ->where('id',$id)
            ->first();
        return $query;
    }
    public function updateCoupon($id,$params){
        $query=DB::table('coupons')
            ->where('id',$id)
            ->update($params);
        return $query;
    }
    public function deleteCoupon($id){
        $delete=DB::table('coupons')
            ->delete($id);
        return $delete;
    }
}
