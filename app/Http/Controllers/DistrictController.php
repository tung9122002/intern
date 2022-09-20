<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseHasHeader;

class DistrictController extends Controller
{
    public function loadDistrict(Request $request){
        $obj=new District();
        $district=$obj->loadList($request->province_id);
        $districtId=view('district.district',compact('district'))->render();
        return response()->json(array('success'=>true,'html'=>$districtId));
    }
}
