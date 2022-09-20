<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body> <br>
   <h1 class=""> {{$title}}</h1>
   {{-- {{dd($cate)}} --}}
   <h3><a href="{{route('sanpham.index')}}">Danh sách sản phẩm</a></h3>
   <h3><a href="{{route('user.index')}}">Danh sách người dùng</a></h3>
   <h3><a href="{{route('order.index')}}">Danh sách đặt hàng</a></h3>
   <h3><a href="{{route('khach-hang.index')}}">Danh sách Khách hàng</a></h3>
<h3><a href="{{route('coupon.index')}}">Danh sách Coupon</a></h3>
    <h3><a href="{{route('khach-hang.index')}}">Thống kê</a></h3>

    <h3><a href="{{route('ship.index')}}">Phí ship</a></h3>

    <a href="{{route('danhmuc.danhmuc_add')}}">Thêm danh mục</a>
<table class="table">
    <tr>
        {{-- <th>id</th> --}}
        <th>Tên danh mục</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhập</th>
        <th>Sửa</th>
        <th>Xóa</th>
        <th>Chi tiết</th>
    </tr>
    <tbody>
        {{-- {{dd($cate)}} --}}
       @foreach ($cate as $item)
           <tr>
            <td>{{ $item->char.''. $item->ten_danhmuc}}</td>
            <td>{{ $item->ngay_tao}}</td>
            <td>{{ $item->ngay_capnhap}}</td>
            <td>
                <a href="{{route('danhmuc.danhmuc_edit',[$item->id])}}">Sửa</a>
            </td>
            <td>
                <a href="{{route('danhmuc.danhmuc_delete',[$item->id])}}">Xóa</a>
            </td>
            <td>
                <a href="{{route('danhmuc.danhmuc_detail',[$item->id])}}">Chi tiết</a>
            </td>
           </tr>
       @endforeach
     </tbody>
{{--    {{$cate->links()}}--}}
</table>
</body>
</html>

