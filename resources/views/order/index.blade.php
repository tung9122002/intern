<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <h1>{{$title}}</h1>
    {{-- {{dd($listDm,$u)}} --}}
    <h3><a href="{{route('user.index')}}">Danh sách người dùng</a></h3>
    <h3><a href="{{route('danhmuc.index')}}">Danh sách danh mục</a></h3>
    <h3><a href="{{route('sanpham.index')}}">Danh sách sản phẩm</a></h3>
    <a href="{{route('sanpham.sanpham_add')}}">Thêm sản phẩm</a>

    {{-- <form action="">
        <select name="id_danhmuc" id="id_dm">
            <option value="">Danh mục</option>
            @php
                showCategories($listDm)
            @endphp
        </select>
        <button type="submit" id="btn_search" data-url="{{route('sanpham.index')}}">Tìm kiếm</button>
    </form> --}}
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số lượng</th>
            <th>Tổng</th>
            <th>Ngày tạo</th>
{{--            <th>Ngày cập nhập</th>--}}
            <th>Chi tiết</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
{{--    {{dd($list)}}--}}
   <tbody class="rows-products">
   @foreach ($list as $key=>$item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->address}} - {{$item->name_district}} - {{$item->name_province}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->total}}$</td>
            <td>{{$item->created_at}}</td>
{{--            <td>{{$item->updated_at}}</td>--}}
            <td><a href="{{route('order.detail_order',[$item->order_id])}}" class="btn btn-primary">Chi tiết</a></td>
            <td><a href="{{route('order.edit_order',[$item->id])}}" class="btn btn-info">Sửa</a></td>
            <td><a onclick="confirm('Bạn đã xóa thành công')" href="{{route('order.delete_order',[$item->order_id])}}" class="btn btn-danger">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
