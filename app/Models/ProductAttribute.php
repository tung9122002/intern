<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Mime\Header\get;

class ProductAttribute extends Model
{
    use HasFactory;
    public function addProductAtt($params){
        $query=DB::table('product_attributes')
            ->insertGetId($params);
        return $query;
    }

    public function pricePro($id_attribute,$id_product){
         $query=DB::table('product_attributes')
             ->select('product_attributes.*')
             ->where('id_product',$id_product)
             ->where('id_attribute',$id_attribute)
             ->first();
//         dd($query);
         return $query;
    }
    public function listAtt($id_product){
        $query=DB::table('product_attributes')
            ->join('product_attribute_value','product_attribute_value.id','=','product_attributes.id_attribute')
            ->select('product_attributes.*','product_attribute_value.name','product_attribute_value.value')
            ->where('id_product',$id_product)
            ->get();
        return $query;
    }
    public function listAttColor($id_product){
        $query=DB::table('product_attributes')
            ->join('product_attribute_value','product_attribute_value.id','=','product_attributes.id_attribute')
            ->select('product_attributes.*','product_attribute_value.name','product_attribute_value.value')
            ->where('id_product',$id_product)
//            ->where('status',1)
                ->groupBy('value')
            ->get();
//        dd($query);
        return $query;
    }
    public function listSku(){
        $query=DB::table('product_sku')
            ->join('product_attributes','product_attributes.id','=','product_sku.attribute')
            ->join('quanly_sp','quanly_sp.id','=','product_attributes.id_product')
            ->join('product_attribute_value','product_attribute_value.id','=','product_attributes.id_attribute')
            ->select('product_sku.*','ten_sp','name','value')
            ->get();
        return $query;
    }
    public function saveAtt($params,$id=null){
        $query=DB::table('product_attributes');
//        dd($params);
            $query=$query->insert($params);
        return $query;
    }
    public function loadNameAtt(){
        $query=DB::table('product_attribute_value')
            ->groupBy('name')
            ->select('name')
            ->get();
        return $query;
    }
    public function detailAtt($name){
        $query=DB::table('product_attribute_value')
            ->where('name',$name)
            ->get();
            return $query;
    }
    public function deleteAtt($id){
        $query=DB::table('product_attributes')
            ->where('id_product',$id)
            ->delete();
        return $query;
    }
    public function updateInventory($id_attribute,$id_product,$inventory){
        $query=DB::table('product_attributes')
            ->where('id_product',$id_product)
            ->where('id_attribute',$id_attribute)
            ->update([
                'inventory'=>$inventory,
            ]);
        return $query;
    }
    public function updatePrice($id_attribute,$id_product,$price){
        $query=DB::table('product_attributes')
            ->where('id_product',$id_product)
            ->where('id_attribute',$id_attribute)
            ->update([
                'price'=>$price,
            ]);
        return $query;
    }

}
