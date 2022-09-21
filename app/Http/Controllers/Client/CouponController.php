<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    //
    public function checkCoupon(Request $request)
    {
        $subtotal=0;
        $obj=new Coupon();
        $coupon = $obj->listCoupon($request->coupon_code);
//        dd($coupon);
        $session = session()->get('showCart');
        foreach ($session as $se) {
            $price = ($se['gia_thitruong'] * $se['so_luong']);
            $subtotal = ($price + $subtotal);
        }
        if ($coupon) {
            $coupon_se = Session::get('coupon_code');
            if ($coupon_se == true) {
                $is_avaiable = 0;
                // nếu tồn tại
                if ($is_avaiable == 0) {
                    $cou = array(
                        'coupon_id'=>$coupon->id,
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    //đặt session
                    Session::put('coupon', $cou);
                }
            }
            else {
                $cou = array(
                    'coupon_id'=>$coupon->id,
                    'coupon_code' => $coupon->coupon_code,
                    'coupon_number' => $coupon->coupon_number,
                );
                Session::put('coupon', $cou);
            }
//            dd($cou['coupon_number']);
            $ship=0;
//            dd(session()->get('coupon'));
            if(!empty(session()->get('fee'))){
                $ship=session()->get('fee');
                $sub=$subtotal-$cou['coupon_number']+$ship;
//             dd(0);
            }
            else{
                $sub=$subtotal-$cou['coupon_number'];
                session()->put('total', $sub);
//                dd(1);
            }
            return response()->json(array('success' => true, 'html'=>$cou,'subtotal'=>$sub));
        }
        else {
//            dd(1);
            Session::flash('error','Mã không đúng');
            return redirect()->back();
        }
    }
}
