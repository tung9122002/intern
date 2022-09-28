<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rating extends Model
{
    use HasFactory;
    // thêm đánh giá sao
    public function saveNew($params){
        $query=DB::table('product_rating')
            ->insertGetId($params);
        return $query;
    }
    // hiển thị đánh giá trang shop-single
    public function loadRatingId($id){
        $query=DB::table('product_rating')
            ->where('product_id',$id)
            ->orderBy('id','desc')
            ->paginate(5);
        return $query;
    }
    // hiển thị tất cả lượt đánh giá
    public function listRating($id){
        $query=DB::table('product_rating')
            ->join('quanly_sp','quanly_sp.id','=','product_rating.product_id')
            ->where('product_id',$id)
            ->orderBy('id','desc')
            ->select('product_rating.*','quanly_sp.ten_sp')
            ->get();
        return $query;
    }
}
