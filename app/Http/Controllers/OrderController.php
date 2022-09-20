<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(){
        $title='Danh sách order';
        $obj=new Order();
        $list=$obj->loadList();
        // dd($list);
        return view('order.index',compact('list','title'));
    }
    public function delete($id){
        $obj=new Order();
        $delete=$obj->deleteOrder($id);
        return redirect()->route('order.index',compact('delete'));
    }
    public function edit($id){

        $title='Sửa Order';
        $obj=new Order();
        $getOrderItem=$obj->getOrderItem();
        $editOrder=$obj->editOne($id);
//        dd($editOrder);
        return view('order.edit',compact('editOrder','title','getOrderItem'));
    }
    public function update($id=null,Request $request){
        $params=[];
        $params=$request->all();
        //        dd($params);
        unset($params['_token']);
        $obj=new Order();
        $res=$obj->updateOrder($id,$params);
        return redirect()->back();
    }
    public function historyOrder($id){
        $cart=session()->get('showCart');
        $objOrder=new Order();
        $historyOrder=$objOrder->historyOrderId($id);
//        dd($historyOrder);
        return view('client.history',compact('historyOrder','cart'));
    }
    public function detailOrder($id,Request $request){
        $tongtien=0;
        $title="Chi tiết";
        $obj=new Order();
        $detailOrder=$obj->loadOne($id);
        foreach ($detailOrder as $detal){
            $subtotal=$detal->quantity*$detal->gia_thitruong;
            $tongtien=($tongtien+$subtotal);
        }
        $fee=$detailOrder[0]->total_pr-$tongtien;
        return view('order.detail',compact('detailOrder','title','tongtien','fee'));
    }
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
}
