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
    {{-- {{dd($dmc)}} --}}
    <form action="" method="post">
        @csrf
        <div>
            <label for="">Tên danh mục</label>
            <input type="text" name='ten_danhmuc'>
            @error('ten_danhmuc')
                <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="">Danh mục cha</label>
            <select name="danhmuc_cha" id="">
                <option value="0">Danh mục cha</option>
                <?php showCategories($danhmuc) ?>
                {{-- @foreach ($danhmuc as $it)
                    <option value="{{$it->id}}">{{$it->ten_danhmuc}}</option>
                @endforeach --}}
            </select>
        </div><br>
        <div>
            <button type="submit">Thêm</button>
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