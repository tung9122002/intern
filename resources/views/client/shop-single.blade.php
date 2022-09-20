@php
    $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp
@extends('templates.layout')
@section('content')
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        <!-- ======================= Top Breadcrubms ======================== -->
        <div class="gray py-3">
            <div class="container">
        </div>
        <!-- ======================= Top Breadcrubms ======================== -->

        <!-- ======================= Product Detail ======================== -->
        <section class="middle">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div><img src="{{asset('assets/img/product/15.png')}}" width="300px" alt=""></div>
                    </div>
{{--                    {{dd($loadOne,$query,$listAtt)}}--}}
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="prd_details">

                                <div class="prt_01 mb-1"><span class="text-purple bg-light-purple rounded py-1">{{$loadOne->ten_danhmuc}}</span></div>
                                <div class="prt_02 mb-3">
                                    <h2 class="ft-bold mb-1">{{$loadOne->ten_sp}}</h2>
                                    <div class="text-left">
                                        <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="small">(412 Reviews)</span>
                                        </div>
                                        <div class="elis_rty"><span class="ft-medium text-muted line-through fs-md mr-2"></span>
                                                    <input type="text" id="price-att" hidden>
                                                    <span class="ft-bold theme-cl fs-lg mr-2" id="gia_sp">Liên hệ</span>
                                                    <span class="ft-regular text-light bg-success py-1 px-2 fs-sm">In Stock</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="prt_03 mb-4">
                                    <p>{!!$loadOne->mota_sp!!}</p>
                                </div>
                                <div class="prt_04 mb-2">
                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">Color:</p>
                                    <div class="text-left">
                                    @foreach($query as $color)
                                        @if($color->name=='color')
                                                <div class="form-check form-option form-check-inline mb-1">
                                                    <input class="form-check-input color" data-color="{{$color->value}}" name="color" id="color{{$loadOne->id_product.$color->id}}" data-id_product="{{$loadOne->id_product}}" data-url_color="{{route('attribute')}}" type="radio" value="{{$color->id}}">
                                                    <label class="form-option-label rounded-circle" name="color" for="color{{$loadOne->id_product.$color->id}}">
                                                        <span class="form-option-color rounded-circle blc7" style="background-color: {{$color->value}}"></span></label>
                                                </div>
                                    @endif
                                            @endforeach
                                    </div>
                                </div>
                                <div class="prt_04 mb-4">
                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium">Size:</p>
                                    <div class="text-left pb-0 pt-2">
{{--                                        {{dd($listSizeProduct)}}--}}
                                @foreach($query as $size)
                                    @if($size->name=='size')
                                    <div class="form-check form-option size-option  form-check-inline mb-2">
                                        <input class="form-check-input size" data-size="{{$size->value}}" type="radio" name="size" hidden value="{{$size->id}}" id="size{{$loadOne->id_product.$size->id}}" data-url="{{route('attribute')}}" data-id_product="{{$loadOne->id_product}}">
                                        <label class="form-option-label" for="size{{$loadOne->id_product.$size->id}}">{{$size->value}}</label>
                                    </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="prt_04 mb-4">
                                    <input type="text" id="inventory-att" hidden>
                                    <p class="d-flex align-items-center mb-0 text-dark ft-medium" id="inventory">Tổng Kho: {{array_sum($inventory)}}</p>
                                </div>
                                <div class="prt_05 mb-4">
                                    <div class="form-row mb-7">
                                        <div class="col-12 col-lg">
                                            <!-- Submit -->
                                            <button type="submit" data-gia="{{$loadOne->gia_thitruong}}" data-id="{{$loadOne->id}}" data-ten="{{$loadOne->ten_sp}}" data-url="{{route('addCart',[$loadOne->id])}}" class="btn btn-block custom-height bg-dark mb-2 addCart">
                                                <i class="lni lni-shopping-basket mr-2"></i>Add to Cart
                                            </button>
                                        </div>
                                        <div class="col-12 col-lg-auto">
                                            <!-- Wishlist -->
                                            <button class="btn custom-height btn-default btn-block mb-2 text-dark" data-toggle="button">
                                                <i class="lni lni-heart mr-2"></i>Wishlist
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="prt_06">
                                    <p class="mb-0 d-flex align-items-center">
                                        <span class="mr-4">Share:</span>
                                        <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
                                            <i class="fab fa-twitter position-absolute"></i>
                                        </a>
                                        <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
                                            <i class="fab fa-facebook-f position-absolute"></i>
                                        </a>
                                        <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted" href="#!">
                                            <i class="fab fa-pinterest-p position-absolute"></i>
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </section>
        <!-- ======================= Product Detail End ======================== -->
        <!-- Product View Modal -->
        <div class="modal fade lg-modal" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickviewmodal" aria-hidden="true">
            <div class="modal-dialog modal-xl login-pop-form" role="document">
                <div class="modal-content" id="quickviewmodal">
                    <div class="modal-headers">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="ti-close"></span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="quick_view_wrap">

                            <div class="quick_view_capt">
                                <div class="prd_details">

                                    <div class="prt_01 mb-1"><span class="text-light bg-info rounded px-2 py-1">Dresses</span></div>
                                    <div class="prt_02 mb-2">
                                        <h2 class="ft-bold mb-1">Women Striped Shirt Dress</h2>
                                        <div class="text-left">
                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="small">(412 Reviews)</span>
                                            </div>
                                            <div class="elis_rty"><span class="ft-medium text-muted line-through fs-md mr-2">$199</span><span class="ft-bold theme-cl fs-lg mr-2">$110</span><span class="ft-regular text-danger bg-light-danger py-1 px-2 fs-sm">Out of Stock</span></div>
                                        </div>
                                    </div>

                                    <div class="prt_03 mb-3">
                                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                                    </div>

                                    <div class="prt_04 mb-2">
                                        <p class="d-flex align-items-center mb-0 text-dark ft-medium">Color:</p>
                                        <div class="text-left">
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" name="color8" id="white8">
                                                <label class="form-option-label rounded-circle" for="white8"><span class="form-option-color rounded-circle blc7"></span></label>
                                            </div>
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" name="color8" id="blue8">
                                                <label class="form-option-label rounded-circle" for="blue8"><span class="form-option-color rounded-circle blc2"></span></label>
                                            </div>
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" name="color8" id="yellow8">
                                                <label class="form-option-label rounded-circle" for="yellow8"><span class="form-option-color rounded-circle blc5"></span></label>
                                            </div>
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" name="color8" id="pink8">
                                                <label class="form-option-label rounded-circle" for="pink8"><span class="form-option-color rounded-circle blc3"></span></label>
                                            </div>
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" name="color8" id="red">
                                                <label class="form-option-label rounded-circle" for="red"><span class="form-option-color rounded-circle blc4"></span></label>
                                            </div>
                                            <div class="form-check form-option form-check-inline mb-1">
                                                <input class="form-check-input" type="radio" name="color8" id="green">
                                                <label class="form-option-label rounded-circle" for="green"><span class="form-option-color rounded-circle blc6"></span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prt_04 mb-4">
                                        <p class="d-flex align-items-center mb-0 text-dark ft-medium">Size:</p>
                                        <div class="text-left pb-0 pt-2">
                                            <div class="form-check size-option form-option form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="28" checked="">
                                                <label class="form-option-label" for="28">28</label>
                                            </div>
                                            <div class="form-check form-option size-option  form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="30">
                                                <label class="form-option-label" for="30">30</label>
                                            </div>
                                            <div class="form-check form-option size-option  form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="32">
                                                <label class="form-option-label" for="32">32</label>
                                            </div>
                                            <div class="form-check form-option size-option  form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="34">
                                                <label class="form-option-label" for="34">34</label>
                                            </div>
                                            <div class="form-check form-option size-option  form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="36">
                                                <label class="form-option-label" for="36">36</label>
                                            </div>
                                            <div class="form-check form-option size-option  form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="38">
                                                <label class="form-option-label" for="38">38</label>
                                            </div>
                                            <div class="form-check form-option size-option  form-check-inline mb-2">
                                                <input class="form-check-input" type="radio" name="size" id="40">
                                                <label class="form-option-label" for="40">40</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prt_05 mb-4">
                                        <div class="form-row mb-7">
                                            <div class="col-12 col-lg-auto">
                                                <!-- Quantity -->
                                                <select class="mb-2 custom-select">
                                                    <option value="1" selected="">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-lg">
                                                <!-- Submit -->
                                                <button type="submit" class="btn btn-block custom-height bg-dark mb-2">
                                                    <i class="lni lni-shopping-basket mr-2"></i>Add to Cart
                                                </button>
                                            </div>
                                            <div class="col-12 col-lg-auto">
                                                <!-- Wishlist -->
                                                <button class="btn custom-height btn-default btn-block mb-2 text-dark" data-toggle="button">
                                                    <i class="lni lni-heart mr-2"></i>Wishlist
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="prt_06">
                                        <p class="mb-0 d-flex align-items-center">
                                            <span class="mr-4">Share:</span>
                                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
                                                <i class="fab fa-twitter position-absolute"></i>
                                            </a>
                                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted mr-2" href="#!">
                                                <i class="fab fa-facebook-f position-absolute"></i>
                                            </a>
                                            <a class="d-inline-flex align-items-center justify-content-center p-3 gray circle fs-sm text-muted" href="#!">
                                                <i class="fab fa-pinterest-p position-absolute"></i>
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginmodal" aria-hidden="true">
            <div class="modal-dialog modal-xl login-pop-form" role="document">
                <div class="modal-content" id="loginmodal">
                    <div class="modal-headers">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="ti-close"></span>
                        </button>
                    </div>

                    <div class="modal-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="m-0 ft-regular">Login</h2>
                        </div>

                        <form>
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" placeholder="Username*">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password*">
                            </div>

                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="flex-1">
                                        <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                        <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                    </div>
                                    <div class="eltio_k2">
                                        <a href="#">Lost Your Password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width bg-dark text-light fs-md ft-medium">Login</button>
                            </div>

                            <div class="form-group text-center mb-0">
                                <p class="extra">Not a member?<a href="#et-register-wrap" class="text-dark"> Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <!-- Cart -->
{{--            {{dd($cart)}}--}}
        <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Cart">
            <div class="rightMenu-scroll">
                <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
                    <h4 class="cart_heading fs-md ft-medium mb-0">Products List</h4>
                    <button onclick="closeCart()" class="close_slide"><i class="ti-close"></i></button>
                </div>
                <div class="right-ch-sideBar">
                    <div class="cart_select_items py-2 showCart">
                        @if($cart==null)
                            <h4 style="margin-left: 20px" class="product_title fs-sm ft-medium mb-0 lh-1">Giỏ hàng chưa có sản phẩm !</h4>
                        @else
                            @foreach($cart as $item)
                                <!-- Single Item -->
                                    <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                                        <div class="cart_single d-flex align-items-center">
                                            <div class="cart_single_caption pl-2">
                                                <h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: {{$item['ten_sp']}}</h4>
                                                <p class="mb-2"><span class="text-dark ft-medium small">Size: {{$item['size']}}</span><br>
                                                    <span class="text-dark small">Màu sắc: {{$item['color']}}</span></p>
                                                <h4 class="fs-md ft-medium mb-0 lh-1">Số lượng: {{$item['so_luong']}}</h4>
                                                <h4 class="fs-md ft-medium mb-0 lh-1">Giá: {{$item['gia_thitruong']}}$</h4>
                                            </div>
                                        </div>
                                        <div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i></button></div>
                                    </div>
                                @endforeach
                        @endif
                    </div>
                    <div class="cart_action px-3 py-3">
                        <div class="form-group">
                            <button type="button" class="btn d-block full-width btn-dark"><a href="{{route('checkOut')}}">Checkout Now</a></button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn d-block full-width btn-dark-light">Edit or View</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        const products = $('.showCart');
        console.log($('.addCart'))
        $('.addCart').click(function(e){
                // $(document).on('click','.addCart',function(e){
                e.preventDefault();
                const elementParent=$(this).parent().parent().parent().parent().parent();
                const checkColor=elementParent.find('.color:checked')
                const checkSize=elementParent.find('.size:checked')
                // console.log(checkColor.val(),checkSize.val());
                const url = $(this).data('url');
                const id = $(this).data('id');
                const gia = $(this).data('gia');
                const ten_sp = $(this).data('ten');
                const priceCk = $('#price-att').val();
                const inventoryCk = $('#inventory-att').val();
                console.log(priceCk.length,inventoryCk);
                let countCart=$('#countCart');
                // console.log(url)
                if (checkColor.val()==undefined && checkSize.val()==undefined){
                    console.log('Heelo');
                    alert('Bạn phải chọn thuộc tính!');
                }
                else {
                    if (priceCk.length) {
                        if (inventoryCk!=0){
                            const color = checkColor.data('color');
                            const size = checkSize.data('size');
                            const price = $('#price-att').val();
                            $.ajax({
                                type: 'GET',
                                url: url,
                                data: {
                                    id: id,
                                    quantity: 1,
                                    gia_thitruong: gia,
                                    ten_sp: ten_sp,
                                    color: color,
                                    size: size,
                                    price: price,
                                },
                                success: function (res) {
                                    console.log(Object.keys(res.cart).length)
                                    // $('.showCart').empty().html(res.html);
                                    console.log(Object.values([res][0]));
                                    let cart = Object.values([res][0]);
                                    countCart.html(Object.keys(res.cart).length)
                                    $('.showCart').html(res.html);
                                },
                                error: function (res) {
                                    console.log('Lỗi');
                                }
                            })
                        }
                        else {
                            alert('Sản phẩm đã hết hàng! ')
                        }

                    } else {
                        alert('Không thể thêm vào giỏ hàng!')
                    }
                }
            }
        )
        $(document).on('change','.size',function (event) {
            const urlPrice=$(this).data('url')
            let sizeId=$(this).val()
            let productId=$(this).data('id_product')
            const giaSp=$('#gia_sp').val()
            const elementParent=$(this).parent().parent().parent().parent().parent();
            const checkColor=elementParent.find('.color:checked')
            console.log(sizeId,urlPrice,productId,checkColor.val());
            if (checkColor){
                $.ajax({
                    type:'GET',
                    url:urlPrice,
                    data:{
                        sizeId:sizeId,
                        colorId:checkColor.val(),
                        id_product:productId
                    },
                    success:function (res){
                        console.log(res.html)
                        if (res.html==null) {
                            $('#inventory-att').val(res.inventory=0)
                            $('#price-att').val(res.html=null)
                            $('#gia_sp').html('Liên hệ')
                            if (res.inventory==null){
                                $('#inventory').html('Kho: 0')
                            }
                            else {
                                $('#inventory').html('Kho: '+res.inventory)
                            }
                        }
                        else {
                            if (res.inventory==null){
                                $('#inventory').html('Kho: 0')
                            }
                            else {
                                $('#inventory').html('Kho: '+res.inventory)
                            }
                            $('#inventory-att').val(res.inventory)
                            $('#price-att').val(res.html)
                            $('#gia_sp').html(res.html + '$')
                        }
                    }
                })
            }
        })
        $(document).on('change','.color',function (event) {
            const urlColor=$(this).data('url_color')
            const colorId=$(this).val()
            const productId=$(this).data('id_product')
            const elementParent=$(this).parent().parent().parent().parent().parent();
            const checkColor=elementParent.find('.color:checked')
            const checkSize=elementParent.find('.size:checked')
            console.log(urlColor,colorId,checkSize.val(),productId)
            if(checkSize){
                $.ajax({
                    type:'GET',
                    url:urlColor,
                    data:{
                        colorId:colorId,
                        id_product:productId,
                        sizeId:checkSize.val(),
                    },
                    success:function (res) {
                        if (res.html==null) {
                            console.log(res.inventory)
                            $('#inventory-att').val(res.inventory=0)
                            $('#price-att').val(res.html=null)
                            $('#gia_sp').html('Liên hệ')
                            if (res.inventory==null){
                                $('#inventory').html('Kho: 0')
                            }
                            else {
                                $('#inventory').html('Kho: '+res.inventory)
                            }
                        }
                        else {
                            if (res.inventory==null){
                                $('#inventory').html('Kho: 0')
                            }
                            else {
                                $('#inventory').html('Kho: ' + res.inventory)
                            }
                                $('#inventory-att').val(res.inventory)
                                $('#price-att').val(res.html)
                                $('#gia_sp').html(res.html + '$')
                        }
                    }
                })
            }
        })
    }
    )
</script>
@endsection
