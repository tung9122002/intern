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
<a href="{{route('attribute.add_att')}}" class="btn btn-info">Thêm Thuộc tính</a><br>
<table class="table">
    <tr>
        <th>id</th>
        <th>Tên sp</th>
        <th>Thuộc tính</th>
        <th>Value</th>
        <th>Price</th>
        <th>Sửa</th>
        <th>Xóa</th>
        {{--        <th>Chi tiết</th>--}}
    </tr>
    <tbody>
    {{--    {{dd($listCoupon)}}--}}
    @foreach ($listSku as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <th>{{$item->ten_sp}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->value}}</td>
            <td>{{ $item->price}}</td>
            <td>
                <a href="{{route('coupon.edit_coupon',[$item->id])}}">Sửa</a>
            </td>
            <td>
                <a onclick="confirm('Bạn đã xóa thành công !')" href="{{route('attribute.delete_att',[$item->id])}}">Xóa</a>
            </td>
            <td>
                {{--                <a href="{{route('danhmuc.danhmuc_detail',[$item->id])}}">Chi tiết</a>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
    {{--    {{$cate->links()}}--}}
</table>
</body>
</html>


