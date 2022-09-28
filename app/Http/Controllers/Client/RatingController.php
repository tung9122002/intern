<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function listRating($id,Request $request){
        $obj=new Rating();
        $listRating=$obj->listRating($id);
        $rating=$listRating->avg('rating');
        return view('client.rating',compact('listRating','rating'));
    }
}
