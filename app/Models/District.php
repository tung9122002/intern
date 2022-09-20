<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class District extends Model
{
    use HasFactory;
    public function loadList($province_id){
        $query=DB::table('location_district')
            ->where('province_id',$province_id)
            ->get();
        return $query;
    }
}
