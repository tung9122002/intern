<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    // lấy thông tin đơn hàng
    public function loadOne($orderId){
        $result = DB::table('order_item')
            ->where('code_order', $orderId)
            ->select('order_item.*')
            ->get();
        return $result;
    }
    // cập nhập trạng thái đơn hàng
    public function updatePaid($orderId){
        $query = DB::table('order_item')
            ->where('code_order', $orderId)
            ->update([
                'paid' => 1,
            ]);
        return $query;
    }
}
