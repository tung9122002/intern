<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    // hiển thị danh sách đánh giá sao
    public function listRating($id,Request $request){
        $obj=new Rating();
        $listRating=$obj->listRating($id);
        // tính trung bình sao
        $rating=$listRating->avg('rating');
        return view('client.rating',compact('listRating','rating'));
    }

    // thêm đánh giá sao từ client
    public function addRating(Request $request){
        $params=$request->all();
        $obj=new Rating();
        $query=$obj->saveNew($params);
//        echo "<pre>";
//        print_r($request->all());
//        echo "</pre>";
//        die();

        return response()->json(array('success'=>true,'html'=>$query));
    }
}
