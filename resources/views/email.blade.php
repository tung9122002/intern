<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gửi Email bằng STMP Gmail</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div>
    <h3>Xin chào: {{$emails['order']['name']}}</h3>
    <h5>Bạn đã mua hàng thành công!</h5>
    <h5>Email: {{$emails['order']['email']}}</h5>
    <h5>Địa chỉ: {{$emails['order']['address']}}</h5>
    <h5>Số điện thoại: {{$emails['order']['phone']}}</h5>

    <table class="table table-bordered" border="1">
        <thead>
        <tr>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
       @foreach($emails['cart'] as $cart)
           <tr>

               <th>{{$cart['ten_sp']}}</th>
               <th>{{$cart['so_luong']}}</th>
               <th>{{$cart['gia_thitruong']}}$</th>
               {{-- <td>{{$emails['ttkh']['ten_khoahoc']}}</td> --}}
           </tr>
       @endforeach
       <tr>
           <th>
               Tổng tiền cần thanh toán:
           </th>
           <td colspan="2">
               {{$emails['total_pr']}}$
           </td>
       </tr>
        <tr>
            <th>
                <a href="{{route('client_detail_order',$emails['order_id'])}}">Chi tiết đơn hàng</a>
            </th>
        </tr>
        </tbody>

    </table>

</div>
