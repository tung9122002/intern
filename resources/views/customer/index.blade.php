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
   <h3><a href="{{route('danhmuc.index')}}">Danh sách danh mục</a></h3>
    <a href="{{route('danhmuc.danhmuc_add')}}">Thêm danh mục</a>
<table class="table">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <tbody>
        {{-- {{dd($cate)}} --}}
       @foreach ($list as $item)
           <tr>
            <td>{{ $item->id}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->email}}</td>
            <td>{{ $item->phone}}</td>
            <td>{{ $item->address}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('danhmuc.danhmuc_edit',[$item->id])}}">Sửa</a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{route('khach-hang.delete_khachhang',[$item->id])}}">Xóa</a>
            </td>
            {{-- <td>
                <a href="{{route('danhmuc.danhmuc_detail',[$item->id])}}">Chi tiết</a>
            </td> --}}
           </tr>
       @endforeach
     </tbody>
</table>
</body>
</html>

