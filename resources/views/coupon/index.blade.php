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
<h3><a href="{{route('khach-hang.index')}}">Thống kê</a></h3>
<h3><a href="{{route('ship.index')}}">Phí ship</a></h3>
<a href="{{route('coupon.add_coupon')}}">Thêm Coupon</a><br>
<a href="{{route('sendMail')}}" class="btn btn-info">Gửi mail khuyễn mãi cho khách hàng</a>
<table class="table">
    <tr>
         <th>id</th>
        <th>Title</th>
        <th>Coupon code</th>
        <th>Discount</th>
        <th>Amount</th>
        <th>Date Start</th>
        <th>Date End</th>
        <th>Status</th>
        <th>Sửa</th>
        <th>Xóa</th>
{{--        <th>Chi tiết</th>--}}
    </tr>
    <tbody>
{{--    {{dd($listCoupon)}}--}}
    @foreach ($listCoupon as $item)
        <tr>
            <td>{{ $item->id}}</td>
            <td>{{ $item->coupon_name}}</td>
            <td>{{ $item->coupon_code}}</td>
            <td>{{ $item->amount}}</td>
            <td>{{ $item->coupon_number}}$</td>
            <td>{{ $item->coupon_date_start}}</td>
            <td>{{ $item->coupon_date_end}}</td>
            @if($item->coupon_date_end>=$now)
                <td class="btn btn-primary" style="width: 100px;">Còn hạn</td>
            @else
                <td class="btn btn-danger" style="width: 100px;">Đã hết hạn</td>
            @endif
            <td>
                <a href="{{route('coupon.edit_coupon',[$item->id])}}">Sửa</a>
            </td>
            <td>
                <a onclick="confirm('Bạn đã xóa thành công !')" href="{{route('coupon.delete_coupon',[$item->id])}}">Xóa</a>
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


