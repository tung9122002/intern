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
        <label for="">Title</label>
        <input type="text" name='coupon_name' value="{{$loadOne->coupon_name}}">
        @error('coupon_name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon Code</label>
        <input type="text" name='coupon_code' value="{{$loadOne->coupon_code}}">
        @error('coupon_code')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Amount</label>
        <input type="text" name='amount' value="{{$loadOne->amount}}">
        @error('amount')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon date start</label>
        <input type="date" name='coupon_date_start' value="{{$loadOne->coupon_date_start}}">
        @error('coupon_date_start')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon date end</label>
        <input type="date" name='coupon_date_end' value="{{$loadOne->coupon_date_end}}">
        @error('coupon_date_end')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon number</label>
        <input type="text" name='coupon_number' value="{{$loadOne->coupon_number}}">
        @error('coupon_number')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <button class="btn btn-success" type="submit">Sửa</button>
        <a class="btn btn-info" href="{{route('coupon.index')}}">Quay lại</a>
    </div>
</form>
</body>
</html>
