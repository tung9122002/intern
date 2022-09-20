<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use function Termwind\ValueObjects\format;

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
    public function index(){
        $title='Danh sách coupon';
        $objCou=new Coupon();
        $listCoupon=$objCou->listCou();
        $now=Carbon::now()->toDateTimeString();
//        dd($now);
        return view('coupon.index',compact('title','listCoupon','now'));
    }
    public function sendMail(){
        $objCou=new Coupon();
        $listCou=$objCou->listCou();
        $objCus=new Customer();
        $customer=$objCus->loadList();
        $now=Carbon::now();
        $title_mail='Mã khuyến mãi ngày '.$now;
        $data=[];
        foreach ($customer as $cus){
            $data['email'][]=$cus->email;
        }
//        dd($listCou);
        Mail::send('send-mail',$data['email'],function ($message) use ($title_mail,$data,$listCou){
            ($message->to($data['email'])->subject($title_mail,$listCou));
            ($message->from($data['email'],$title_mail,$listCou));
        });
        return redirect()->back()->with('message','Gửi coupon thành công');
    }
    public function add(Request $request){
        $title='Thêm coupon';
//        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
//        dd($request->all());
        if ($request->isMethod('post')){
            $params=$request->all();
            unset($params['_token']);
//            dd($params);
            $obj=new Coupon();
            $res=$obj->saveNew($params);
//            if ($res==null){
//                return redirect()->route('coupon.index');
//            }
//            elseif ($res>0){
//                echo '<script>alert("Thêm Coupon thành công")</script>';
//                return redirect()->route('coupon.add_coupon');
//            }
//            else{
//                echo '<script>alert("Thêm Coupon thất bại")</script>';
//                return redirect()->route('coupon.add_coupon');
//            }
        }
        return view('coupon.add',compact('title'));
    }
    public function edit($id){
        $title='Sửa coupon';
        $objCou=new Coupon();
        $loadOne=$objCou->loadOne($id);
//        dd($loadOne);
        return view('coupon.edit',compact('title','loadOne'));
    }
    public function update($id,Request $request){
        $params=$request->all();
//        dd($params);
        unset($params['_token']);
        $objCou=new Coupon();
        $res=$objCou->updateCoupon($id,$params);
        if ($res==null){
            return redirect()->route('coupon.index');
        }
        elseif ($res>0){
            echo '<script>alert("Sửa Coupon thành công")</script>';
            return redirect()->route('coupon.index');
        }
        else{
            echo '<script>alert("Sửa coupon thất bại")</script>';
            return redirect()->route('coupon.index');
        }
    }
    public function delete($id){
        $obj=new Coupon();
        $deleteCoupon=$obj->deleteCoupon($id);
        return redirect()->route('coupon.index');
    }
}
