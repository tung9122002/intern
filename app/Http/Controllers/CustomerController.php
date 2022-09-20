<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
        $title="Danh sách Khách hàng";
        $obj=new Customer();
        $list=$obj->loadList();
        return view('customer.index',compact('title','list'));
    }
    public function delete($id){
        $obj=new Customer();
        $delete=$obj->deleteCustomer($id);
        return redirect()->route('khach-hang.index');
    }
}
