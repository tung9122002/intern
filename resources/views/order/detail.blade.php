
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
{{--{{dd($detailOrder)}}--}}
<table class="table">
    <thead>
    <tr>
        <th>Id</th>
{{--        <th>Tên</th>--}}
        <th>Tên sản phẩm</th>
        <th>số lượng</th>
        <th>Giá tiền</th>
        <th>Tổng tiền</th>
        <th>Ngày tạo</th>
        <th>Xóa</th>
    </tr>
    </thead>
    {{-- {{dd($query)}} --}}
    <tbody class="rows-products">

    @foreach (($detailOrder) as $item)
        <tr>
            <td>{{$item->id}}</td>
{{--            <td>{{$item->name}}</td>--}}
            <td>{{$item->ten_sp}}</td>
            <th>{{$item->quantity}}</th>
            <th>{{$item->gia_thitruong}}$</th>
            <th>{{$item->total}}$</th>
            <td>{{$item->created_at}}</td>
            <td><a onclick="confirm('Bạn đã xóa thành công')" href="{{route('order.delete_order',[$item->id])}}" class="btn btn-danger">Xóa</a></td>
        </tr>
    @endforeach
    <tr>
        <th colspan="">Shipping fee:</th>
        <td>{{$fee}}$</td>
    </tr>
    <tr>
        <th>Subtotal:</th>
        <td>{{$tongtien}}$</td>
    </tr>
    <tr>
        <th>Total:</th>
        <td>{{$detailOrder[0]->total_pr}}$</td>
    </tr>
    </tbody>
</table>

</body>
</html>
