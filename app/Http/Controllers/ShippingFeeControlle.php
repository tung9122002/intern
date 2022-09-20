<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

class ShippingFeeControlle extends Controller
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
    public function index(){
        $title='Danh sách Phí ship';
        $obj=new ShippingFee();
        $list=$obj->ShipList();
        return view('shipping.index',compact('title','list'));
    }
    public function add(Request $request){
        $title='Thêm ship';
        $obj=new Province();
        $list=$obj->listProvinceShip();
//        dd($list);
        if ($request->isMethod('post')){
            $params=$request->post();
//            dd($params);
            unset($params['_token']);
            $objShip=new ShippingFee();
            $res=$objShip->saveNew($params);
            if ($res==null){
                redirect()->route('ship.index');
            }
            elseif ($res>0){
                echo '<script>alert("Thêm ship thành công")</script>';
                redirect()->route('ship.index');
            }
            else{
                echo '<script>alert("Thêm ship không thành công")</script>';
                redirect()->route('ship.index');
            }
        }
        return view('shipping.add',compact('title','list'));
    }
    public function edit($id){
        $title='Sửa';
        $obj=new Province();
        $list=$obj->listProvince();
        $obj=new ShippingFee();
        $editShip=$obj->loadOne($id);
        return view('shipping.edit',compact('title','list','editShip'));
    }
    public function update($id,Request $request){
        $params=$request->post();
        unset($params['_token']);
        $obj=new ShippingFee();
        $res=$obj->saveUpdate($id,$params);
        return redirect()->route('ship.index');
    }
    public function delete($id){
        $objShip=new ShippingFee();
        $deleteShip=$objShip->deleteShip($id);
        return redirect()->route('ship.index');
    }
}
