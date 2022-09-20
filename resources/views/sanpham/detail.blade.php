
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        select{
            width: 500px;
        }
    </style>
</head>

<body>
<h1>{{$title}}</h1>
{{-- {{dd($listDm,$u)}} --}}
<h3><a href="{{route('user.index')}}">Danh sách người dùng</a></h3>
<h3><a href="{{route('danhmuc.index')}}">Danh sách danh mục</a></h3>
<h3><a href="{{route('attribute.index')}}">Danh sách thuộc tính</a></h3>
<div>
{{--    {{dd($loadName)}}--}}
   <table class="table">
      <thead>
      <th>Màu sắc</th>
      <th>Kích thước</th>
      </thead>
        <form action="{{route('sanpham.detail_update',[$productDetail->id])}}" method="POST" id="form">
            @csrf
            <td>
               <div>
                    @foreach($loadName as $name)
                        <input type="checkbox">{{$name->name}}
                   @endforeach
               </div>
                <button>Chọn</button>
            </td>
            <td>
                <select class="selectcolor" name="colors[]" multiple="multiple">
                    @foreach($listColor as $color)
                        <option value="{{$color->id}}">{{$color->value}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select class="selectsize" name="sizes[]" multiple="multiple">
                    @foreach($listSize as $size)
                        <option value="{{$size->id}}">{{$size->value}}</option>
                    @endforeach
                </select>
            </td>
        </form>
   </table>
</div>
<a class="btn btn-info" href="{{route('attribute.add_att')}}">Thêm thuộc tính</a>
<a class="btn btn-info button-att">Cập nhập thông tin thuộc tính</a>
<table class="table">
    <thead>
    <tr>
{{--        <th>Id</th>--}}
        <th>Màu sắc</th>
        <th>Size</th>
        <th>Giá</th>
        <th>ảnh</th>
        <th>Tồn kho</th>
{{--        <th>Mặc định</th>--}}
        <th>Ẩn</th>
    </tr>
    </thead>
    <tbody class="rows-products">
{{--    {{dd($listAtt)}}--}}
            @foreach($listAtt as $att)
{{--                {{dd($att)}}--}}
                <tr>
                    @foreach($listColor as $color)
{{--                            {{dd((explode('~',$att->id_attribute)))}}--}}
                            @if(in_array($color->id,explode('~',$att->id_attribute)))
                        <td>
                                {{$color->value}}
                        </td>
                            @endif
                    @endforeach
                    @foreach($listSize as $size)
                        @if(in_array($size->id,explode('~',$att->id_attribute)))
                            <td>
                                {{$size->value}}
                            </td>
                            @endif
                        @endforeach

                       <td><input data-id_product="{{$att->id_product}}" data-id_attribute="{{$att->id_attribute}}" name="price" class="price" type="text" value="{{$att->price}}"></td>
                        <form method="POST" enctype="multipart/form-data" class="laravel-ajax-file-upload"
                              action="javascript:void(0)">
                            <input name="id_product" value="{{$att->id_product}}" hidden>
                            <input name="id_attribute" value="{{$att->id_attribute}}" hidden>
                       <td>
                           @if($att->image==null)
                               <img class="img" src="https://i.9mobi.vn/cf/Images/son/2020/3/26/cach-lam-anh-dai-dien-facebook-trong-khong-14.jpg" width="70px">
                               <label class="btn-image" for="image{{$att->id_attribute}}">chọn ảnh</label>
                               <input class="image" style="display: none" id="image{{$att->id_attribute}}" name="image" type="file">
                               <span class="text-danger">{{ $errors->first('image') }}</span>
                           @else
                               <img class="img" src="{{asset($att->image)}}" width="70px">
                               <label class="btn-image" for="image{{$att->id_attribute}}">chọn ảnh</label>
                               <input class="image" style="display: none" id="image{{$att->id_attribute}}" name="image" type="file">
                               <span class="text-danger">{{ $errors->first('image') }}</span>
                       </td>
                           @endif

                        </form>
                       <td><input data-id_product="{{$att->id_product}}" data-id_attribute="{{$att->id_attribute}}" class="inventory" name="inventory" type="text" value="{{$att->inventory}}"></td>
{{--                       <td><input type="radio" name="radio"></td>--}}
                       <td>
                           @if($att->status=='1')
                               <form method="post" action="{{route('sanpham.update-product-status',$att->id)}}">
                                   @csrf
                                   <input name="status" value="0" hidden>
                               <button type="submit" class="btn btn-success">Đang hiện</button>
                               </form>
                           @endif
                           @if($att->status=='0')
                               <form method="post" action="{{route('sanpham.update-product-status',$att->id)}}">
                                   @csrf
                                   <input name="status" value="1" hidden>
                                   <button type="submit" class="btn btn-danger">Đang ẩn</button>
                               </form>
                           @endif
                       </td>

                </tr>
            @endforeach
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('.selectcolor').select2({
            tokenSeparators: [',']
        });
        $('.selectsize').select2({
            tokenSeparators: [',']
        });
        $(document).on('click','.button-att',function (e) {
            e.preventDefault();
            const color=$('.selectcolor').val();
            const size=$('.selectsize').val();
            console.log(color,size)
            if (color && size){
            $('#form').submit();
            }
            else {
                alert('Bạn chưa chọn!');
            }
        })
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
        $(document).ready(function (e) {
            $(document).on('change','.image',function (event) {
                const img = $(this).parent().find('.image');
                const file = img[0].files[0];
                console.log(img[0].files);
                const preview = $(this).parent().find('.img');
                console.log(preview[0].src)
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    preview[0].src = reader.result;
                console.log(reader.result)
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                const form=$(this).parent().parent().find('.laravel-ajax-file-upload');
                console.log(form[0])
                var formData = new FormData(form[0]);
                $.ajax({
                    type:'POST',
                    url: "{{ url('sanpham/update-product-att')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        alert('Thêm hình ảnh thành công');
                        console.log(data);
                    },
                    error: function(data){
                        console.log('Lỗi');
                    }
                });
            })
            $(document).on('keyup','.price',function (event) {
                const price=$(this).val();
                const productId=$(this).data('id_product');
                const attributeId=$(this).data('id_attribute');
                console.log(price);
                $.ajax({
                    type:'GET',
                    url: "{{ url('sanpham/update-product-price')}}",
                    data: {
                        price:price,
                        id_product:productId,
                        id_attribute:attributeId,
                    },
                    success: (data) => {
                        console.log(data);
                    },
                    error: function(data){
                        console.log('Lỗi');
                    }
                });
            })
            $(document).on('keyup','.inventory',function (event) {
                const inventory=$(this).val();
                const productId=$(this).data('id_product');
                const attributeId=$(this).data('id_attribute');
                console.log(inventory,productId,attributeId);
                $.ajax({
                    type:'GET',
                    url: "{{url('sanpham/update-product-inventory')}}",
                    data:{
                        inventory:inventory,
                        id_product:productId,
                        id_attribute:attributeId,
                    },
                    success:function (res) {
                        console.log(res)
                    },
                    error:function (res) {
                        console.log('Lỗi')
                    }
                })
            })
        });
</script>
</body>
</html>

