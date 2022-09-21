<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    //
    public function loadDistrict(Request $request){
        $obj=new District();
        $district=$obj->loadList($request->province_id);
        $districtId=view('district.district',compact('district'))->render();
        return response()->json(array('success'=>true,'html'=>$districtId));
    }
}
