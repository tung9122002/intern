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
        <label for="">Tỉnh\Thành</label>
        <select name="province_id" id="province_id">
            @foreach($list as $item)
                <option value="{{$item->id}}">
                       {{$item->name_province}}
                </option>
            @endforeach
        </select>
    </div><br>
    <div>
        <label for="">Giá</label>
        <input type="text" name='fee'>
    </div>
    <div>
        <button type="submit">Thêm</button>
    </div>
</form>
</body>
</html>
