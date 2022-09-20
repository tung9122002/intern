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
        <label for="">ID attribute</label>
        <input type="text" name='id_attribute'>
        @error('id_attribute')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Price</label>
        <input type="text" name='price'>
        @error('price')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Thêm</button>
    </div>
</form>
</body>
</html>
