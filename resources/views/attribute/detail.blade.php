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
        <th>Value</th>
{{--        <th>Sửa</th>--}}
        <th>Xóa</th>
    </tr>
    <tbody>
{{--    {{dd($detail)}}--}}
        @foreach ($detail as $item)
            <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td style="background-color: {{$item->value}}">{{ $item->value}}</td>
{{--                <td>--}}
{{--                    <a class="btn btn-primary" href="{{route('coupon.edit_coupon',[$item->id])}}">Sửa</a>--}}
{{--                </td>--}}
                <td>
                    <a class="btn btn-danger" onclick="confirm('Bạn đã xóa thành công !')" href="{{route('attribute.delete_att',[$item->id])}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
    {{--    {{$cate->links()}}--}}
</table>
</body>
</html>


