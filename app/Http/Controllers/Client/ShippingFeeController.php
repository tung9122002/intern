<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

class ShippingFeeController extends Controller
{
    //
    public function loadShipping(Request $request){
        $subtotal=0;
        $obj=new ShippingFee();
        $shipping=$obj->loadList($request->province_id);
        $session = session()->get('showCart');
        foreach ($session as $se) {
            $price = ($se['gia_thitruong'] * $se['so_luong']);
            $subtotal = ($price + $subtotal);
        }
        if (!empty($shipping->fee)){
            session()->put('fee',$shipping->fee);
            $total = $subtotal + $shipping->fee;
            session()->put('total', $total);
            return response()->json(array('success' => true, 'shippingFee'=>$shipping->fee,'total'=>$total));
        }
        else {
            $shipping=0;
            $total = $subtotal + $shipping;
            session()->put('total', $total);
            session()->forget('fee');
            return response()->json(array('success' => true, 'shippingFee'=>$shipping,'total'=>$total));
        }
    }
}
