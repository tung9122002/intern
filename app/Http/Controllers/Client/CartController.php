<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    // danh sách sản phẩm giỏ hàng
    public function listCart(){
        $total=0;
        $cart=session()->get('showCart');
        if(!empty($cart)){
            foreach($cart as $it){
                $subtotal=($it['gia_thitruong']*$it['so_luong']);
                $total=($total+$subtotal);
            }
        }
//        dd($cart);
        return view('client.cart',compact('cart','total'));
    }

    // thêm sản phẩm vào giỏ hàng
    public function addCart($id, Request $request){
//        dd($request->all());
        $giaSp=$request->giaSp;
        $color=$request->color;
        $size=$request->size;
        $cart=session()->get('showCart');
        // nếu sản phẩm đã tồn tại trong giỏ hàng thì số lượng +1
        if(isset($cart[$id.$color.$size])){
            $cart[$id.$color.$size]['so_luong']+=1;
        }
        // nếu sp chưa có trong giỏ hàng
        else{
            $cart[$id.$color.$size]=[
                'id'=>$id,
                'ten_sp'=>$request->ten_sp,
                'so_luong'=>$request->quantity,
                'gia_thitruong'=>$request->price,
                'color'=>$color,
                'size'=>$size,
            ];
        }
        // echo "<pre>";
        // print_r($cart);
        // echo "</pre>";
        // die();
        // lưu session
        session()->put('showCart',$cart);
        $render=view('cart.cart',compact('cart'))->render();
        return response()->json(array('success'=>true,'html'=>$render,'cart'=>$cart));
        ;
    }
    public function deleteCart($id,Request $request){
        $cart=session()->get('showCart');
//        dd($cart);
        session()->forget('showCart');
//        foreach ($cart as $it){
//            $dele=$it['id'].$it['color'].$it['size'];
//        if(isset($dele)){
//            unset($dele);
//            session()->put('showCart',$cart);
//        }
//        }
        return redirect()->back();
    }
}
