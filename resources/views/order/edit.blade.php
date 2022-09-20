<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

</head>
<body>
{{-- {{dd($list)}} --}}
{{$title}}
<form action="" method="post">
    @csrf
    <div>
        <label for="">Order_id</label>
            <select name="order_id">
                @foreach($getOrderItem as $ot)
                    <option {{$editOrder->order_id==$ot->id?"selected":""}} value="{{$ot->id}}">{{$ot->id}}</option>
                @endforeach
            </select>
        @error('order_id')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div><br
    <div>
        <label for="">Product_id</label>
        <input type="text" name="product_id" value="{{$editOrder->product_id}}">
        @error('product_id')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div><br>
    <div>
        <label for="">Quantity</label>
        <input type="text" name="quantity" value="{{$editOrder->quantity}}">
    </div><br>
    <div>
        <label for="">Total</label>
        <input type="text" name="total" value="{{$editOrder->total}}">
    </div><br>
    <div>
        <label for="">Trạng Thái</label>
        <input type="text" name="trang_thai" value="{{$editOrder->trang_thai}}">
    </div><br>

    <div>
        <button type="submit">Sửa </button>
    </div>

</form>

</body>
</html>
