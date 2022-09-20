
@foreach ($query as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->ten_sp}}</td>
        <td>{{$item->id_danhmuc}}</td>
        <td>{{$item->gia_thitruong}}</td>
        <td>{{$item->gia_niemyet}}</td>
        <td>{{$item->mota_ngan}}</td>
        <td>{{$item->mota_sp}}</td>
        <td>{{$item->ngay_tao}}</td>
        <td>{{$item->ngay_capnhap}}</td>
        <td><a href="{{route('sanpham.sanpham_edit',[$item->id])}}" class="btn btn-primary">Sửa</a></td>
            <td><a onclick="confirm('Bạn đã xóa thành công')" href="{{route('sanpham.sanpham_delete',[$item->id])}}" class="btn btn-danger">Xóa</a></td>
    </tr>
@endforeach 
                  