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
<a href="{{route('ship.add_ship')}}">Thêm phí ship</a>
<table class="table">
    <tr>
        {{-- <th>id</th> --}}
        <th>Id</th>
        <th>Id tỉnh</th>
        <th>Giá</th>
        <th>Ngày cập nhập</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <tbody>
    {{-- {{dd($cate)}} --}}
    @foreach ($list as $item)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>{{ $item->name_province}}</td>
            <td>{{ $item->fee}}$</td>
            <td>{{ $item->update_at}}</td>
            <td>
                <a href="{{route('ship.edit_ship',[$item->id])}}">Sửa</a>
            </td>
            <td>
                <a onclick="confirm('Bạn đã xóa thành công !')" href="{{route('ship.delete_ship',[$item->id])}}">Xóa</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

