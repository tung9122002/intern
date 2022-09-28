<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckOutRequest;
use App\Mail\MailNotify;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //
    public function checkOut(){
        session()->forget('fee');
        session()->forget('coupon');
        $objProvince=new Province();
        $listProvince=$objProvince->listProvince();
//        dd($listProvince);
        $total=0;
        $cart=session()->get('showCart');
        if(!empty($cart)){
            foreach($cart as $it){
                $subtotal=((int)$it['gia_thitruong']*(int)  $it['so_luong']);
                $total=($total+$subtotal);
            }
        }
        return view('client.checkout',compact('cart','total','listProvince'));
    }
    public function postCheckOut(CheckOutRequest $request){
        $params=[];
        $product=[];
        $total=0;
        $data=[];
        $params=$request->post();
        $cou=session()->get('coupon');
//        dd($cou);
        session()->get('total');
        unset($params['_token']);
//        $objProvince=new Province();
//        $listProvince=$objProvince->listProvince();
        $objSp=new Customer();
        $query=$objSp->add($params);
        $cart=session()->get('showCart');
        $codeOrder=time();
        if (empty($cou['coupon_id'])){
//            dd(null);
            $orderItem=new Order();
            $orderId=$orderItem->addOrderItem(['customer_id'=>$query,'total_pr'=>session()->get('total'),'coupon_id'=>$cou['coupon_id']=null,'code_order'=>$codeOrder]);
            $tal=session()->get('total');
        }
        else {
//            dd(1);
            $orderItem = new Order();
            $orderId = $orderItem->addOrderItem(['customer_id' => $query, 'total_pr' => session()->get('total')-$cou['coupon_number'], 'coupon_id' => $cou['coupon_id'],'code_order'=>$codeOrder]);
//         dd($orderId);
            $tal=session()->get('total')-$cou['coupon_number'];
        }
//        dd($cart);
        if ($cart==null){
            \Illuminate\Support\Facades\Session::flash('error','Giỏ Hàng chưa có sản phẩm !');
            return redirect()->route('checkOut');
        }
        else {
            foreach ($cart as $key => $item) {
                $subtotal = ((int)$item['gia_thitruong'] * (int)$item['so_luong']);
                $total = ($total + $subtotal);
                $data[] = [
                    'order_id' => $orderId,
                    'product_id' => $item['id'],
                    'total' => $subtotal,
                    'quantity' => $item['so_luong'],
                    'color' => $item['color'],
                    'size' => $item['size']
                ];
            };
//        dd($tal);
//         foreach($cart as $key=>$it){
//         if(!in_array($key,$product)){
//             $product[]=$key;
//         }
//
//        $subtotal=($it['gia_thitruong']*$it['so_luong']);
//        $total=($total+$subtotal);
//         }
//         $productIds=implode(' ',$product);
//         $data=[
//             'order_id'=>$orderId,
//             'product_id'=>$productIds,
//             'quantity'=>$it['so_luong'],
//             'total'=>$total,
//         ];
        }
        $order=$orderItem->addOrder($data);
//        Mail::to($params['email'])->send(new MailNotify([
//            'order'=>$params,
//            'cart'=>$cart,
//            'order_id'=>$orderId,
//            'total_pr'=>$tal,
//        ]));
        session()->forget('showCart','total');
        return redirect()->route('complete_order',[$codeOrder]);
    }
    // đặt hàng thành công
    public function completeOrder(Request $request,$code){
        $obj=new Order();
        $data=$obj->completeOrder($code);
//        dd($data);
        $title='Đặt hàng thành công';
        return view('client.complete-order',compact('title','code','data'));
    }

}
