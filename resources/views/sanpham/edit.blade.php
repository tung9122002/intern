<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1>{{$title}}</h1>
{{--    {{dd($data)}}--}}
    <form action="" method="post">
        @csrf
        <div>
            <label for="">Tên sản phẩm</label>
            <input type="text" name="ten_sp" value="{{$data->ten_sp}}">
            @error('ten_sp')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div><br>
        <div>
            <label for="">Tên danh mục</label>
            <select name="id_danhmuc" id="">
                <?php showCategories($list) ?>
            </select>
        </div><br>
        <div>
            <label for="">giá thị trường</label>
            <input type="text" name="gia_thitruong" value="{{$data->gia_thitruong}}">
            @error('gia_thitruong')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div><br>
        <div>
            <label for="">giá niêm yết</label>
            <input type="text" name="gia_niemyet" value="{{$data->gia_niemyet}}">
        </div><br>
        <div>
            <label for="">Mô tả ngắn</label>
            <textarea rows="4" cols="50" type="textarea" name="mota_ngan">{{$data->mota_ngan}}</textarea>
            @error('mota_ngan')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="">Mô tả sản phẩm :</label>
            <textarea style="width:40%" id="textarea" rows="4" cols="50" type="textarea" name="mota_sp">{{$data->mota_sp}}</textarea>
            @error('mota_sp')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
{{--        <div>--}}
{{--            <label for="">Màu sắc: </label>--}}
{{--            @foreach($listColor as $color)--}}
{{--                <input style="margin-left: 10px" type="checkbox" name="id_attribute[]" value="{{$color->id}}">--}}
{{--                <i class="fa-solid fa-palette" style="color: {{$color->value}}">{{$color->value}}</i>--}}
{{--            @endforeach--}}
{{--            @error('')--}}
{{--            <div class="text-danger">{{$message}}</div>--}}
{{--            @enderror--}}
{{--        </div><br>--}}
{{--        <div>--}}
{{--            <label for="">Size: </label>--}}
{{--            @foreach($listSize as $size)--}}
{{--                <input style="margin-left: 10px" type="checkbox" value="{{$size->id}}" name="id_attribute[]">--}}
{{--                <i>{{$size->value}}</i>--}}
{{--            @endforeach--}}
{{--            @error('')--}}
{{--            <div class="text-danger">{{$message}}</div>--}}
{{--            @enderror--}}
{{--        </div><br>--}}
        <div>
            <label for="">Ngày cập nhập</label>
            <input type="date" name="ngay_capnhap" value="{{$data->ngay_capnhap}}">
        </div>
        <div>
            <button type="submit">Sửa </button>
            <button><a style="text-decoration: none;color:black" href="{{route('sanpham.index')}}">Quay lại</a></button>
        </div>

    </form>

</body>
</html>
<script>
    ClassicEditor
        .create( document.querySelector( '#textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
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
