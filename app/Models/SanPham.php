<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPham extends Model
{
    use HasFactory;
    protected $fillable=['product_attributes.price','product_attributes.id_attribute','product_attributes.id_product','product_attribute_value.name','product_attribute_value.value','quanly_sp.id','ten_sp','danhmuc_sp.danhmuc_cha','danhmuc_sp.ten_danhmuc','gia_thitruong','gia_niemyet','mota_ngan','mota_sp','quanly_sp.ngay_tao','quanly_sp.ngay_capnhap','category_track'];
    public function list(){
        $list=DB::table('quanly_sp')
        ->join('danhmuc_sp','danhmuc_sp.id','=','quanly_sp.id_danhmuc')
        ->leftJoin('product_attributes','product_attributes.id_product','=','quanly_sp.id')
            ->leftJoin('product_attribute_value','product_attribute_value.id','=','product_attributes.id_attribute')
//            ->groupBy('id_product')
            ->select($this->fillable)
        ->get();
        return $list;
    }
    public function listSp(){
        $listSp=DB::table('quanly_sp')
            ->join('danhmuc_sp','danhmuc_sp.id','=','quanly_sp.id_danhmuc')
            ->select('quanly_sp.*','danhmuc_sp.ten_danhmuc')
            ->orderBy('id','DESC')
            ->get();
        return $listSp;
    }
    public function detailPro($id_attribute){
        $list=DB::table('quanly_sp')
            ->leftJoin('product_attributes','product_attributes.id_product','=','quanly_sp.id')
            ->leftJoin('product_attribute_value','product_attribute_value.id','=','product_attributes.id_attribute')
            ->where('id_product','LIKE','%'.$id_attribute.'%')
//            ->select($this->fillable)
            ->get();
        return $list;
    }

    public function saveNew($params){
        $query=$params;
        $query=DB::table('quanly_sp')
        ->insertGetId($params);
        return $query;
    }
    public function deleteSp($id){
        $delete=DB::table('quanly_sp')
        ->delete($id);
        return $delete;
    }
    public function loadOne($id){
        $data=DB::table('quanly_sp')
            ->join('danhmuc_sp','danhmuc_sp.id','=','quanly_sp.id_danhmuc')
            ->leftJoin('product_attributes','product_attributes.id_product','=','quanly_sp.id')
            ->leftJoin('product_attribute_value','product_attribute_value.id','=','product_attributes.id_attribute')
            ->where('quanly_sp.id',$id)
            ->select($this->fillable)
        ->first();
        return $data;
    }
    public function updateSp($id,$params=[]){
        $data=$params;
        $res=DB::table('quanly_sp')
        ->where('id',$id)
        ->update($data);
        return $res;
    }
    public function listProductOfCate($id_danhmuc){
        $query=DB::select("SELECT * FROM quanly_sp WHERE MATCH(category_track) AGAINST( '$id_danhmuc' IN BOOLEAN MODE )");
        return $query;
    }
    public function TableCategories($categories, $danhmuc_cha = 0, $char ='')
    {
        $result = [];
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->danhmuc_cha == $danhmuc_cha)
            {
                $item->char=$char;
                $result[] = $item;
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);
                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $child = $this->TableCategories($categories, $item->id, $char.'---');
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
    public function listAtt(){
        $query=DB::table('product_attribute_value')
            ->groupBy('name')
            ->get();
        return $query;
    }
    public function saveNewAtt($params){
        $query=DB::table('product_attribute_value')
            ->insert($params);
//        dd($params);
        return $query;
    }
    public function deleteAtt($id){
        $deleteAtt=DB::table('product_attribute_value')
            ->delete($id);
        return $deleteAtt;
    }
    public function listColor(){
        $listColor=DB::table('product_attribute_value')
            ->where('name','color')
            ->get();
        return $listColor;
    }
    public function listSize(){
        $listSize=DB::table('product_attribute_value')
            ->where('name','size')
            ->get();
        return $listSize;
    }
}
