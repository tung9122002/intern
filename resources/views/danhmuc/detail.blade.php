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
{{--     {{dd($query)}}--}}
    <table class="table">
        <thead>
            <tr>
                {{-- <th>id</th> --}}
                {{-- <th>Tên danh mục</th> --}}
                <th>Tên sản phẩm</th>
                <th>giá thị trường</th>
                <th>giá niêm yết</th>
                <th>mô tả ngắn</th>
                <th>mô tả sản phẩm</th>
                <th>ngày tạo</th>
                <th>ngày cập nhập</th>
            </tr>
        </thead>
        <tbody>
          @foreach ( $query as $item)
          <tr>
            {{-- <td>{{$item->id}}</td> --}}
            {{-- <td>{{$item->ten_danhmuc}}</td> --}}
            <td>{{$item->ten_sp}}</td>
            <td>{{$item->gia_thitruong}}</td>
            <td>{{$item->gia_niemyet}}</td>
            <td>{{$item->mota_ngan}}</td>
            <td>{!!$item->mota_sp!!}</td>
            <td>{{$item->ngay_tao}}</td>
            <td>{{$item->ngay_capnhap}}</td>
            </tr>
          @endforeach
        </tbody>
    </table>
</body>
</html>
