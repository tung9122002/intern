<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    //
    public function index(){
        $title='Danh sách thuộc tính';
        $objAtt=new SanPham();
        $listAtt=$objAtt->listAtt();
        return view('attribute.index',compact('title','listAtt'));
    }
    public function add(Request $request){
        $value=$request->value;
        $name=$request->name;
//        dd($value,$name);
        $title='Thêm thuộc tính';
        if ($request->isMethod('post')){
            DB::beginTransaction();
            try {
                $params=$request->all();
                unset($params['_token']);
                $obj=new SanPham();
                $result=[];
//            dd($params['values']);
                foreach ($params['value'] as $pa){
                    $result[]=[
                        'name'=>$name,
                        'value'=>$pa,
                    ];
                }
//                dd($result);
                $res=$obj->saveNewAtt($result);
                DB::commit();
            }
            catch (Exception $e){
                DB::rollBack();
                throw new Exception($e->getMessage());
            }
        }
        return view('attribute.add',compact('title'));
    }
    public function deleteAtt($id){
        $obj=new SanPham();
        $deleteAtt=$obj->deleteAtt($id);
        return redirect()->route('attribute.index');
    }
    public function DetailAtt($name){
        $title='Chi tiết thuộc tính';
        $obj=new ProductAttribute();
        $detail=$obj->detailAtt($name);
        return view('attribute.detail',compact('detail','title'));
    }

}
