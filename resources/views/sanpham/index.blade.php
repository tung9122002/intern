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
    <h3><a href="{{route('attribute.index')}}">Danh sách thuộc tính</a></h3>
    <a class="btn btn-info" href="{{route('sanpham.sanpham_add')}}">Thêm sản phẩm</a>

    <form action="">
        <select name="id_danhmuc" id="id_dm">
            <option value="">Danh mục</option>
            @php
                showCategories($listDm)
            @endphp
        </select>
        <button type="submit" id="btn_search" data-url="{{route('sanpham.index')}}">Tìm kiếm</button>
    </form>
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Tên danh mục</th>
            <th>Giá thị trường</th>
            <th>Giá niêm yết</th>
            <th>Mô tả ngắn</th>
            <th>Mô tả sản phẩm</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhập</th>
            <th>Chi tiết</th>
            <th>Cập nhập</th>
            <th>Xóa</th>
        </tr>
    </thead>
   {{-- {{dd($query)}} --}}
   <tbody class="rows-products">
   @foreach ($list as $key=>$item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$item->ten_sp}}</td>
            <td>{{$item->ten_danhmuc}}</td>
            <td>{{$item->gia_thitruong}}</td>
            <td>{{$item->gia_niemyet}}</td>
            <td>{{$item->mota_ngan}}</td>
            <td>{!!$item->mota_sp!!}</td>
            <td>{{$item->ngay_tao}}</td>
            <td>{{$item->ngay_capnhap}}</td>
            <td><a href="{{route('sanpham.detail_sanpham',[$item->id])}}" class="btn btn-info">Cập nhập</a></td>
            <td><a href="{{route('sanpham.sanpham_edit',[$item->id])}}" class="btn btn-primary">Sửa</a></td>
            <td><a onclick="confirm('Bạn đã xóa thành công')" href="{{route('sanpham.sanpham_delete',[$item->id])}}" class="btn btn-danger">Xóa</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
<?php
function showCategories($categories, $danhmuc_cha = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->danhmuc_cha == $danhmuc_cha)
        {
            echo '<option value="'.$item->id.'">'.$char.$item->ten_danhmuc.'</option>' ;
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);

            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item->id, $char.'---');
        }
    }
}
?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        const products = $('.rows-products');
        $(document).on('click','#btn_search',function(e){

            e.preventDefault();
            const urlSearch = $(this).data('url');
            const idDm = $('#id_dm').val();

            $.ajax({
                type: 'GET',
                url: urlSearch,
                data: {
                    id_danhmuc: idDm
                },
                success: function (res) {
                    // let htmls = [res].map(function (item,key) {
                        $('.rows-products').empty().html(res.html);
                //         console.log(item)
                //         return ` <tr>
                //     <td>${key+1}</td>
                //     <td>${item.ten_sp}</td>
                //     <td>${item.id_danhmuc}</td>
                //     <td>${item.gia_thitruong}</td>
                //     <td>${item.gia_niemyet}</td>
                //     <td>${item.mota_ngan}</td>
                //     <td>${item.mota_sp}</td>
                //     <td>${item.ngay_tao}</td>
                //     <td>${item.ngay_capnhap}</td>
                // </tr>`
                //     })

                    // products.html(htmls.join(' '));
                    console.log(products.html());
                },
                error: function (res) {
                    console.log('Lỗi');
                }
            })

        })
    })
</script>
