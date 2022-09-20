<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOutRequest;
use App\Http\Requests\SanPhamRequest;
use App\Mail\MailNotify;
use App\Models\Customer;
use App\Models\DanhMuc;
use App\Models\District;
use App\Models\Order;
use App\Models\ProductAttribute;
use App\Models\Province;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use function Spatie\Ignition\Config\toArray;
use function Symfony\Component\Console\Style\success;
use function Symfony\Component\Mime\Header\get;

class SanPhamController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(Request $request){
        $this->v['title']='Danh sách sản phẩm';
        // dd($request->id_danhmuc);
        $obj=new SanPham();
        $query=$obj->listSp();
        $objDm=new DanhMuc();
        $listDm=$objDm->listDm()->toArray();
        // $u=$this->showCategories($listDm);
        // // dd($u);
        // $this->v['u']=$u;
        if($request->id_danhmuc){
            $query=$obj->listProductOfCate($request->id_danhmuc);
            // dd($query);
            $query=view('viewRend',compact('query'))->render();
            return response()->json(array('success' => true, 'html'=>$query));
        }
        // dd($query);
        $this->v['list']=$query;
        return view('sanpham.index',$this->v,compact('listDm','query'));
    }
    public function add(SanPhamRequest $request){
        $this->v['title']='Thêm sản phẩm';
        $objDm=new DanhMuc();
        $list=$objDm->listDm();
        $obj=new SanPham();
        $listColor=$obj->listColor();
        $listSize=$obj->listSize();
//        dd($request->all());
        if($request->isMethod('post')){
            $u=$this->categoryTree($list,$request->id_danhmuc);
            // dd($u);
            $categoryTrack=implode(" ",$u);
            $params=$request->post();
//            dd($request->all());
            $params['category_track']=$categoryTrack;
            unset($params['_token']);
//            unset($params['id_attribute']);
//            dd($request->ten_sp);
//            dd($data);
            $objSp=new SanPham();
            $query=$objSp->saveNew($params);
//            foreach ($request->id_attribute as $value){
//                $objAtt=new ProductAttribute();
//                $addAtt=$objAtt->addProductAtt(['id_product'=>$query,'id_attribute'=>$value]);
////                dd($value);
//            }
            if($query==null){
                redirect()->route('sanpham.index');
            }
            elseif($query>0){
                echo '<script>alert("Thêm sản phẩm thành công")</script>';
                redirect()->route('sanpham.index');
            }
            else{
                echo '<script>alert("Lỗi thêm sản phẩm")</script>';
                redirect()->back();
            }
        }
        return view('sanpham.add',$this->v,compact('list','listColor','listSize'));
    }
    public function delete($id){
        $obj=new SanPham();
        $this->v['delete']=$obj->deleteSp($id);
        return redirect()->route('sanpham.index');
    }
    public function edit($id){
        $this->v['title']='Sửa sản phẩm';
        $obj=new SanPham();
        $listColor=$obj->listColor();
        $listSize=$obj->listSize();
        $objDm=new DanhMuc();
        $this->v['list']=$objDm->list();
        $obj=new SanPham();
        $this->v['data']=$obj->loadOne($id);
        return view('sanpham.edit',$this->v,compact('listSize','listColor'));
    }
    public function update($id,SanPhamRequest $request){
        if($request->isMethod('post')){
            $params=[];
            $params=$request->post();
//            dd($params);
            unset($params['_token']);
            unset($params['id_attribute']);
            $obj=new SanPham();
            $res=$obj->updateSp($id,$params);
            // if($res==null){
            //     redirect()->route('sanpham.index');
            // }
            // elseif($res>0){
            //     echo '<script>alert("Sửa sản phẩm thành công")</script>';
            //     redirect()->back();
            // }
            // else{
            //     echo '<script>alert("Lỗi sửa sản phẩm")</script>';
            //     redirect()->back();
            // }

        }
        return redirect()->route('sanpham.index');
    }
    public function categoryTree($data, $danhmuc_con) {
        $result = [];
        foreach ($data as $item) {
            if($item->id == $danhmuc_con) {
                $result[] = $item->id;
                // unset($data[$item['id']]);
                $child = $this->categoryTree($data, $item->danhmuc_cha);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
    public function detail($id){
//        $total=0;
        $title='Chi tiết sp';
        $obj=new SanPham();
        $listColor=$obj->listColor();
        $listSize=$obj->listSize();
        $productDetail=$obj->loadOne($id);
        $objAtt=new ProductAttribute();
        $listAtt=$objAtt->listAtt($id);
        $loadName=$objAtt->loadNameAtt();
//        dd($loadName);
        return view('sanpham.detail',compact('loadName','listAtt','productDetail','title','listColor','listSize'));
    }
    public function detailUpdate($id,Request $request){
        $colors=$request->colors;
        $sizes=$request->sizes;
//        dd($colors,$sizes);
        $result=[];
        $result2=[];
        foreach ($colors as $it){
            foreach ($sizes as $item){
                $result[]=[
                    'id_product'=>$id,
                    'id_attribute'=>($it.'~'.$item),
                ];
                $result2[]=[$it,$item];
            }
        }
        //        $result3=[];
//        foreach ($result2 as $re){
//
//           $result3[]=implode('~',$re);
//        }
//        dd($result);

        $obj=new ProductAttribute();
        $productAtt=$obj->listAtt($id);
//        dd($productAtt);
        if ($productAtt->count()==0){
        $save=$obj->saveAtt($result);
        }
        else{
//            dd(1);
//            foreach ($productAtt as $att){
            $delete=$obj->deleteAtt($id);
//            dd($delete);
//            }
            $save=$obj->saveAtt($result);
        }

        return redirect()->back();
    }
    public function updateProductPrice(Request $request){
        $id_product=$request->id_product;
        $id_attribute=$request->id_attribute;
        $price=$request->price;
        $obj=new ProductAttribute();
        $updatePrice=$obj->updatePrice($id_attribute,$id_product,$price);

//        $update=DB::table('product_attributes')
//            ->where('id_product',$request->id_product)
//            ->where('id_attribute',$request->id_attribute)
//            ->update([
//                'price'=>$request->price,
//            ]);
        return Response()->json([
            "success" => true,
        ]);
    }
    public function updateProductInventory(Request $request){
//        dd($request->inventory);
        $id_product=$request->id_product;
        $id_attribute=$request->id_attribute;
        $inventory=$request->inventory;
//        dd($inventory);
        $obj=new ProductAttribute();
        $updateIn=$obj->updateInventory($id_attribute,$id_product,$inventory);
//        $query=DB::table('product_attributes')
//            ->where('id_product',$request->id_product)
//            ->where('id_attribute',$request->id_attribute)
//            ->update([
//                'inventory'=>$request->inventory,
//            ]);
        return response()->json([
            "success"=>true,
        ]);
    }
    public function updateProductStatus($id,Request $request){
//        dd($request->all());
        $update=DB::table('product_attributes')
            ->where('id',$id)
            ->update([
                'status'=>$request->status,
            ]);
        return redirect()->back();
    }
    public function updateProductAtt(Request $request){
//        print_r($request->image);
//        request()->validate([
//            'file'  => 'required|mimes:doc,docx,pdf,txt|max:2048',
//        ]);
//        dd($request->price);

        if (!empty($request->image)){
            if ($request->hasFile('image')) {
                $files = $request->file('image');
//            dd($files);
                $fileName = $files->getClientOriginalName();
                $filePath = $files->storeAs('public/product',$fileName);
                $update=DB::table('product_attributes')
                    ->where('id_product',$request->id_product)
                    ->where('id_attribute',$request->id_attribute)
                    ->update([
                        'image'=>Storage::url($filePath),
                    ]);
                return Response()->json([
                    "success" => true,
                    "file" => $files
                ]);

            }
        }
        return Response()->json([
            "success" => false,
            "file" => ''
        ]);
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
    public function addCart($id, Request $request){
//        dd($request->all());
        $giaSp=$request->giaSp;
        $color=$request->color;
        $size=$request->size;
        $cart=session()->get('showCart');
        if(isset($cart[$id.$color.$size])){
            $cart[$id.$color.$size]['so_luong']+=1;
        }
        else{
            $cart[$id.$color.$size]=[
                'id'=>$request->id,
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
        session()->put('showCart',$cart);
        $render=view('cart.cart',compact('cart'))->render();
        return response()->json(array('success'=>true,'html'=>$render,'cart'=>$cart));
        ;
    }
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
            $subtotal=($it['gia_thitruong']*$it['so_luong']);
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
//        dd($cart);
        if (empty($cou['coupon_id'])){
//            dd(null);
            $orderItem=new Order();
            $orderId=$orderItem->addOrderItem(['customer_id'=>$query,'total_pr'=>session()->get('total'),'coupon_id'=>$cou['coupon_id']=null]);
            $tal=session()->get('total');
        }
        else {
//            dd(1);
            $orderItem = new Order();
            $orderId = $orderItem->addOrderItem(['customer_id' => $query, 'total_pr' => session()->get('total')-$cou['coupon_number'], 'coupon_id' => $cou['coupon_id']]);
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
                $subtotal = ($item['gia_thitruong'] * $item['so_luong']);
                $total = ($total + $subtotal);
                $data[] = [
                    'order_id' => $orderId,
                    'product_id' => $key,
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
        Mail::to($params['email'])->send(new MailNotify([
            'order'=>$params,
            'cart'=>$cart,
            'order_id'=>$orderId,
            'total_pr'=>$tal,
        ]));
        session()->forget('showCart','total');
        return redirect()->route('listCart');
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
//    public function loadAttribute(Request $request){
//        $objAtt=new ProductAttribute();
//        $att=$objAtt->pricePro($request->id_attribute,$request->id_product);
////        dd($att);
//        return response()->json(array('success' => true, 'html'=>$att->price));
//    }
    public function loadAttribute(Request $request){
        $objAtt=new ProductAttribute();
        $att=$objAtt->pricePro($request->colorId.'~'.$request->sizeId,$request->id_product);
//        dd($att);
        return response()->json(array('success' => true, 'html' => $att->price,'inventory'=>$att->inventory));
    }
}

