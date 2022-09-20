<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class DanhMuc extends Model
{
    use HasFactory;
    protected $fillable=['danhmuc_sp.id','danhmuc_cha','ten_danhmuc','ngay_tao','ngay_capnhap'];
    public function list(){
        $list=DB::table('danhmuc_sp')
        ->select($this->fillable)
        ->get();
        return $list;
    }
    public function saveNew($params){
        $data=$params;
        $data=DB::table('danhmuc_sp')
        ->insertGetId($params);
        return $data;
    }
    public function deleteDm($id){
        $delete=DB::table('danhmuc_sp')
        ->delete($id);
        return $delete;
    }
    public function loadList($id){
        $loadlist=DB::table('danhmuc_sp')
        ->find($id);
        return $loadlist;
    }
    public function updateDm($id,$params=[]){
        $data=$params;
        $res=DB::table('danhmuc_sp')
        ->where('id',$id)
        ->update($data);
        return $res;
    }
    public function listDm(){
        $list=DB::table('danhmuc_sp')
        // ->where('danhmuc_cha',0)
        ->get();
        return $list;
    }
    public function listProductOfCate($id){
        // $query=DB::table('quanly_sp')
        // ->join('danhmuc_sp','quanly_sp.id_danhmuc','=','danhmuc_sp.id')
        // ->where('category_track','LIKE','%'.$id.'%')
        // ->select('quanly_sp.*','danhmuc_sp.ten_danhmuc','danhmuc_sp.danhmuc_cha')
        // ->get();
        $query=DB::select("SELECT * FROM quanly_sp WHERE MATCH(category_track) AGAINST( '$id' IN BOOLEAN MODE )");
        return $query;
    }

}
