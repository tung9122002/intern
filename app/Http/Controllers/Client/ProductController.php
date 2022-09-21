<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\ProductAttribute;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //trang chủ
    public function productList(Request $request){
//         dd($request->id_danhmuc);
        $obj=new SanPham();
        $listSp=$obj->listSp();
        $query=$obj->list();
//        dd($query);
//        $listAttColor=$obj->listAttColor($id);
        $objDm=new DanhMuc();
        $listDm=$objDm->listDm()->toArray();
        $cate=$obj->TableCategories($listDm);
        $this->v['list']=$query;
        $cart=session()->get('showCart');
        $total=0;
        // dd($query);
        if(!empty($cart)){
            foreach($cart as $it){
                $subtotal=($it['gia_thitruong']*$it['so_luong']);
                $total=($total+$subtotal);
            }
        }
        if($request->id_danhmuc){
            $rend=$obj->listProductOfCate($request->id_danhmuc);
            // dd($query);
            $rend=view('ProductRend',compact('rend'))->render();
            return response()->json(array('success' => true, 'html'=>$rend));
        }
        else{
            $request->id_danhmuc=null;
        }
        return view('client.sanpham',$this->v,compact('listDm','query','cart','total','cate','listSp'));
        // $array=collect($cart);
    }
    public function shopSingle($id,Request $request){
        $obj=new SanPham();
        $objAtt=new ProductAttribute();
        $listColor=$obj->listColor();
        $listSize=$obj->listSize();
        $loadOne=$obj->loadOne($id);
        $listAtt=$objAtt->listAtt($id);
//        dd($listAtt);
        $result=[];
        foreach ($listAtt as $one){
            foreach (explode('~',$one->id_attribute) as $it){
                $result[]=$it;
            }
        }
        $inventory=[];
        foreach ($listAtt as $in){
            $inventory[]+=$in->inventory;
        }
        $att=array_unique($result); //gỡ bỏ bản sao các value trong mảng
        $query=DB::table('product_attribute_value')
            ->whereIn('id',$att)
            ->get();
//        dd($query);
        $listAttColor=$objAtt->listAttColor($id);
        $min=$objAtt->listAtt($id)->min('price');
        $max=$objAtt->listAtt($id)->max('price');

        $cart=session()->get('showCart');
        $total=0;
        if(!empty($cart)){
            foreach($cart as $it){
                $subtotal=($it['gia_thitruong']*$it['so_luong']);
                $total=($total+$subtotal);
            }
        }
        return view('client.shop-single',compact('inventory','listAtt','listColor','listSize','loadOne','query','cart','total','min','max'));
    }
}
