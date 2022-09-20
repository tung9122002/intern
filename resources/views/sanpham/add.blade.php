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
    {{-- {{dd($list)}} --}}
    <h1>{{$title}}</h1>
    <form action="" method="post">
        @csrf
        <div>
            <label for="">Tên sản phẩm</label>
            <input type="text" name="ten_sp">
            @error('ten_sp')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div><br>
        <div>
            <label for="">Tên danh mục</label>
            <select name="id_danhmuc" id="">
                <option value="">Chọn 1</option>
                <?php showCategories($list)  ?>
                {{-- @foreach ($list as $it)
                <option value="{{$it->id}}">{{$it->ten_danhmuc}}</option>
                @endforeach --}}
            </select>
            @error('id_danhmuc')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div><br>
        <div>
            <label for="">giá thị trường</label>
            <input type="text" name="gia_thitruong">
            @error('gia_thitruong')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div><br>
        <div>
            <label for="">giá niêm yết</label>
            <input type="text" name="gia_niemyet">
        </div><br>
        <div>
            <label for="">Mô tả ngắn</label>
            <textarea rows="4" cols="50" type="textarea" name="mota_ngan"></textarea>
            @error('mota_ngan')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="">Mô tả sản phẩm</label>
            <textarea id="textarea" rows="4" cols="50" type="textarea" name="mota_sp"></textarea>
            @error('mota_sp')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div><br>
{{--        <div>--}}
{{--            <label for="">Màu sắc: </label>--}}
{{--            @foreach($listColor as $color)--}}
{{--            <input style="margin-left: 10px" type="checkbox" name="id_attribute[]" value="{{$color->id}}">--}}
{{--                <i class="fa-solid fa-palette" style="color: {{$color->value}}">{{$color->value}}</i>--}}
{{--            @endforeach--}}
{{--            @error('')--}}
{{--            <div class="text-danger">{{$message}}</div>--}}
{{--            @enderror--}}
{{--        </div><br>--}}
{{--        {{dd($listSize)}}--}}
{{--        <div>--}}
{{--            <label for="">Size: </label>--}}
{{--            @foreach($listSize as $size)--}}
{{--            <input class="inputAtt" style="margin-left: 10px" type="checkbox" value="{{$size->id}}" name="id_attribute[]">--}}
{{--                <i >{{$size->value}}</i>--}}
{{--            @endforeach--}}
{{--            @error('')--}}
{{--            <div class="text-danger">{{$message}}</div>--}}
{{--            @enderror--}}
{{--        </div>--}}
        <div>
            <button type="submit">Thêm </button>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('change','.inputAtt',function (event) {
            const ip=$(this).val();
            console.log(ip);
        })
    })
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
