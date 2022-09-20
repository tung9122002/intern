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
        <label for="">Name</label>
        <select name="name" id="inputName">
            <option>--Chọn thuộc tính--</option>
            <option value="color">Màu sắc</option>
            <option value="size">Size</option>
            <option>Tùy chọn thuộc tính</option>
        </select>
        @error('name')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
        <label for="">Value</label>
    <div>
        <label class="value1" id="v1">
            <button class="btn btn-info" type="button" id="btn-addColor">+</button>
        </label>
    </div>
    <br>
    <div>
        <label class="value2" id="v2">
            <button class="btn btn-info" type="button" id="btn-addSize">+</button>
        </label>
    </div>
    <div>
        <input type="text" placeholder="Tên thuộc tính" name="name" class="value3" id="v3">
        @error('value')
        <div class="text-danger">{{$message}}</div>
        @enderror
    </div>
    <div>
        <label class="value4" id="v4">
            <button class="btn btn-info" type="button" id="btn-add">+</button>
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </div>
</form>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // console.log('Hello')
    $(document).ready(function () {
                $('.value1').hide()
                $('.value2').hide()
                $('.value3').hide()
                $('.value4').hide()
        $(document).on('change','#inputName',function (event) {
            const ip= $('#inputName').val();
            console.log(ip);
            if (ip=='color'){
                $('.value1').show()
                $('#v1').attr({
                    name:'',
                })
                $('.value2').hide()
                $('#v2').attr({
                    name:'',
                })
                $('.value3').hide()
                $('#v3').attr({
                    name:'',
                })
                $('.value4').hide()
                $('#v4').attr({
                    name:'',
                })
            }
            else if(ip=='size') {
                $('.value2').show()
                $('#v2').attr({
                    name:'value[]'
                });
                $('.value1').hide()
                $('#v1').attr({
                    name:''
                });
                $('.value3').hide()
                $('#v3').attr({
                    name:'',
                })
                $('.value4').hide()
                $('#v4').attr({
                    name:'',
                })
            }
            else{
                $('.value3').show()
                $('#v3').attr({
                    name:'name'
                });
                $('.value4').show()
                $('#v4').attr({
                    name:'value'
                });
                $('.value1').hide()
                $('#v1').attr({
                    name:''
                });
                $('.value2').hide()
                $('#v2').attr({
                    name:'',
                })
            }
        })
        $(document).on('click','#btn-addColor',function (event) {
            // alert('Hello')
            $('#v1').append('</br> <input type="color" name="value[]" class="value1" id="v1"><button class="btn btn-danger" id="btn-delete">-</button></br>')
        })
        $(document).on('click','#btn-delete',function (event) {
            $('#v1').empty();
        })
        $(document).on('click','#btn-delete',function (event) {
            $('#v2').last().remove();
        })
        $(document).on('click','#btn-addSize',function (event) {
            // alert('Hello')
            $('#v2').append('</br> <input type="text" placeholder="Nhập giá trị" name="value[]" class="value2" id="v2"><button id="btn-delete" class="btn btn-danger">-</button></br>')
        })
        $(document).on('click','#btn-add',function (event) {
            // alert('Hello')
            $('#v4').append('</br> <input type="text" placeholder="Nhập giá trị" name="value[]" class="value4" id="v4"> <button id="btn-delete" class="btn btn-danger">-</button> </br>')
        })
    })
</script>
