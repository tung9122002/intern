<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    public function loadList(){
        $query=DB::table('customer')
        ->get();
        return $query;
    }
    public function add($params){
        $query=DB::table('customer')
        ->insertGetId($params);
        return $query;
    }
    public function deleteCustomer($id){
        $delete=DB::table('customer')
        ->delete($id);
        return $delete;
    }   
}
