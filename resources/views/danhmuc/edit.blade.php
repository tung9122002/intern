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
    <form action="" method="post">
        @csrf
        <div>
            <label for="">Tên danh mục</label>
            <input type="text" name='ten_danhmuc' value="{{$loadlist->ten_danhmuc}}">
            @error('ten_danhmuc')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="">Danh mục cha</label>
            <select name="danhmuc_cha" id="">
                
               <?php showCategories($list) ?>
            </select>
        </div><br>
        <div>
            <label for="">Ngày cập nhập</label>
            <input type="date" name="ngay_capnhap" value="{{$loadlist->ngay_capnhap}}">
        </div>
        <div>
            <button type="submit">Sửa</button>
            <button ><a style="text-decoration: none;color:black" href="{{route('danhmuc.index')}}">Quay lại</a></button>
        </div>
    </form>
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