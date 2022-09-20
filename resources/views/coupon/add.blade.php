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
<?php //Hiển thị thông báo thành công?>
@if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif

<?php //lỗi hệ thống ?>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
<form action="" method="post">
    @csrf
    <div>
        <label for="">Title</label>
        <input type="text" name='coupon_name'>
        @error('coupon_name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon Code</label>
        <input type="text" name='coupon_code'>
        @error('coupon_code')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Amount</label>
        <input type="text" name='amount'>
        @error('amount')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon date start</label>
        <input type="date" name='coupon_date_start'>
        @error('coupon_date_start')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon date end</label>
        <input type="date" name='coupon_date_end'>
        @error('coupon_date_end')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label for="">Coupon number</label>
        <input type="text" name='coupon_number'>
        @error('coupon_number')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <button type="submit">Thêm</button>
    </div>
</form>
</body>
</html>
