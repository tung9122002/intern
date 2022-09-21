<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function detailOrderClient($id,Request $request){
        $tongtien=0;
        $cart=session()->get('showCart');
        $title="Chi tiết";
        $obj=new Order();
        $detailOrder=$obj->loadOne($id);
        $cou=session()->get('coupon');
//        dd($detailOrder);
        foreach($detailOrder as $it) {
            $subtotal = ($it->total);
            $tongtien = ($tongtien + $subtotal);
        }
//        $cou=session()->get('coupon');
//            dd($tongtien);
        return view('client.detailOrder',compact('detailOrder','title','tongtien'));
    }
    // lịch sử đơn hàng
    public function historyOrder($id){
        $cart=session()->get('showCart');
        $objOrder=new Order();
        $historyOrder=$objOrder->historyOrderId($id);
//        dd($historyOrder);
        return view('client.history',compact('historyOrder','cart'));
    }
}
