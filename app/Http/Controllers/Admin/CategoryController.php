<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(Request $request){
        $title='Danh mục sản phẩm';
        $obj=new DanhMuc();
        $list=$obj->list();
        $cate=$this->TableCategories($list);
        // dd($cate);
        return view('danhmuc.index',compact('list','title','cate'));
    }
    public function add(DanhMucRequest $request){

        $this->v['title']='Thêm danh mục';
        $obj=new DanhMuc();
        $danhmuc=DB::table('danhmuc_sp')
            // ->where('danhmuc_cha',0)
            ->get();
        if($request->isMethod('post')){
            $params=$request->post();
            unset($params['_token']);
            $objDm=new DanhMuc();
            $data=$objDm->saveNew($params);
            if($data==null){
                redirect()->route('danhmuc.index');
            }
            elseif($data>0){
                echo '<script>alert("Thêm danh mục thành công")</script>';
                redirect()->route('danhmuc.index');
            }
            else{
                echo '<script>alert("Lỗi thêm danh mục")</script>';
                redirect()->route('danhmuc.index');
            }
        }
        return view('danhmuc.add',$this->v,compact('danhmuc'));
    }
    public function delete($id){

        $obj=new DanhMuc();
        $this->v['delete']=$obj->deleteDm($id);
        $danhmuc = DB::table('danhmuc_sp')
            ->get();
        return redirect()->route('danhmuc.index');
    }
    public function edit($id){
        $this->v['title']='Sửa danh mục';
        $obj=new DanhMuc();
        $this->v['list']=$obj->list();
        $this->v['loadlist']=$obj->loadList($id);
        return view('danhmuc.edit',$this->v);
    }
    public function update($id,DanhMucRequest $request){
        if($request->isMethod('post')){
            $params=[];
            $params=$request->post();
            unset($params['_token']);
            $obj=new DanhMuc();
            $this->v['res']=$obj->updateDm($id,$params);
        }
        return redirect()->route('danhmuc.index');
    }
    public function TableCategories($categories, $danhmuc_cha = 0, $char ='')
    {
        $result = [];
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->danhmuc_cha == $danhmuc_cha)
            {
                $item->char=$char;
                $result[] = $item;
                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                $child = $this->TableCategories($categories, $item->id, $char.'---');
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }
}
