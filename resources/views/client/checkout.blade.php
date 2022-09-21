@extends('templates.layout')
    @section('content')

        <!-- ======================= Top Breadcrubms ======================== -->
        <div class="gray py-3">
            <div class="container">
                <div class="row">
                    <div class="colxl-12 col-lg-12 col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Support</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================= Top Breadcrubms ======================== -->
        <!-- ======================= Product Detail ======================== -->
        <section class="middle">
            <div class="container">

                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="text-center d-block mb-5">
                            <h2>Checkout</h2>
                        </div>
                    </div>
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
                </div>

                <div class="row justify-content-between">
                    <div class="col-12 col-lg-7 col-md-12">
                        <form method="POST">
                            @csrf
                            <h5 class="mb-4 ft-medium">Billing Details</h5>
                            <div class="row mb-2">
                                <input type="text" name="id_user" id="" value="{{Auth::user()->id??""}}" hidden>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Name *</label>
                                        <input type="text" name="name" value="{{Auth::user()->name??""}}" class="form-control" placeholder="First Name" />
                                        @error('name')
                                            <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Email *</label>
                                        <input type="email" name="email" value="{{Auth::user()->email??""}}" class="form-control" placeholder="Email" />
                                        @error('email')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Tỉnh/Thành *</label>
                                        <select name="province_id" id="province_id" data-shipping="{{route('shipping')}}" data-url="{{route('district')}}">
                                            <option value="">--Mời bạn chọn tỉnh thành--</option>
                                            @foreach($listProvince as $province)
                                                <option value="{{$province->id}}">{{$province->name_province}}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Quận/Huyện *</label>
                                        <select name="district_id" id="district_id">
                                            <option>--Mời bạn chọn tỉnh thành--</option>
                                        </select>
                                        @error('district_id')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Số nhà *</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address" />
                                        @error('address')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label class="text-dark">Phone *</label>
                                        <input type="text" name="phone" value="{{Auth::user()->sdt??""}}" class="form-control" placeholder="Phone" />
                                        @error('phone')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-4">
                                <div class="col-12 d-block">
                                    <input id="createaccount" class="checkbox-custom" name="createaccount" type="checkbox">
                                    <label for="createaccount" class="checkbox-custom-label">Create An Account?</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btm-md full-width">Pay</button>
                            </div>
                        </form>
                        <form action="{{route('payment')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <button type="submit" name="redirect" class="btn btn-dark btm-md full-width">Thanh Toán VNPAY</button>
                            </div>
                        </form>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-12 col-lg-4 col-md-12">
                        <div class="d-block mb-3">
                            <h5 class="mb-4">Order Items</h5>
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">

                                @foreach ((array)$cart as $item)
                                    <li class="list-group-item">
                                        <div class="row align-items-center">
                                            <div class="col-3">
                                                <!-- Image -->
                                                <a href="product.html"><img src="assets/img/product/7.jpg" alt="..." class="img-fluid"></a>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <div class="cart_single_caption pl-2">
                                                    <h4 class="product_title fs-md ft-medium mb-1 lh-1">Tên: {{$item['ten_sp']}}</h4>
                                                     <p class="mb-1 lh-1"><span class="text-dark">Màu sắc: {{$item['color']}}</span></p>
                                                    <p class="mb-3 lh-1"><span class="text-dark">Size: {{$item['size']}}</span></p>
                                                    <p class="mb-1 lh-1"><span class="text-dark">Số lượng: {{$item['so_luong']}}</span></p>

                                                    <h4 class="fs-md ft-medium mb-3 lh-1">{{$item['gia_thitruong']}}$</h4>
                                                </div>
                                            </div>
                                            <div class="fls-last">
                                                <a href="{{route('deleteCart',[$item['id']])}}"><i class="ti-close"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card mb-4 gray">
                            <div class="card-body">
                                <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                    <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                        <span>Shipping Fee</span> <span class="ml-auto text-dark ft-medium">
                                             <p name="shipping_id" id="shipping_id">

                                            </p>
                                        </span>
{{--                                        <span>Phí Ship</span> <span class="ml-auto text-dark ft-medium">{{$total}}$</span>--}}
                                    </li>
                                    <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                        <span>Subtotal</span> <span class="ml-auto text-dark ft-medium">{{$total}}$</span>
                                    </li>
                                    <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                        <span>Coupon</span> <span id="coupon" class="ml-auto text-dark ft-medium">0$</span>
                                    </li>
                                    <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                        <span>Total</span> <span class="ml-auto text-dark ft-medium" id="total" ></span>
                                    </li>
                                    <li class="list-group-item d-flex text-dark fs-sm ft-regular">
{{--                                        <form>--}}
                                            <span><input name="coupon_code" id="coupon_code" placeholder="Coupon"></span>
                                            <span class="ml-auto text-dark ft-medium">
                                                <button id="btn-coupon" style="margin-left: 80px" type="submit" data-urlcoupon="{{route('check_coupon')}}">Áp dụng</button>
                                            </span>
{{--                                        </form>--}}
                                    </li>
                                    <li class="list-group-item fs-sm text-center">
                                        Shipping cost calculated at Checkout *
                                    </li>
                                </ul>
                            </div>
                        </div>

                        {{-- <a class="btn btn-block btn-dark mb-3" href="checkout.html">Place Your Order</a> --}}
                    </div>

                </div>

            </div>
        </section>
        <!-- ======================= Product Detail End ======================== -->

        <!-- ============================= Customer Features =============================== -->
        <section class="px-0 py-3 br-top">
            <div class="container">
                <div class="row">

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="d-flex align-items-center justify-content-start py-2">
                            <div class="d_ico">
                                <i class="fas fa-shopping-basket theme-cl"></i>
                            </div>
                            <div class="d_capt">
                                <h5 class="mb-0">Free Shipping</h5>
                                <span class="text-muted">Capped at $10 per order</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="d-flex align-items-center justify-content-start py-2">
                            <div class="d_ico">
                                <i class="far fa-credit-card theme-cl"></i>
                            </div>
                            <div class="d_capt">
                                <h5 class="mb-0">Secure Payments</h5>
                                <span class="text-muted">Up to 6 months installments</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="d-flex align-items-center justify-content-start py-2">
                            <div class="d_ico">
                                <i class="fas fa-shield-alt theme-cl"></i>
                            </div>
                            <div class="d_capt">
                                <h5 class="mb-0">15-Days Returns</h5>
                                <span class="text-muted">Shop with fully confidence</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="d-flex align-items-center justify-content-start py-2">
                            <div class="d_ico">
                                <i class="fas fa-headphones-alt theme-cl"></i>
                            </div>
                            <div class="d_capt">
                                <h5 class="mb-0">24x7 Fully Support</h5>
                                <span class="text-muted">Get friendly support</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ======================= Customer Features ======================== -->
        <!-- Cart -->
        <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Cart">
            <div class="rightMenu-scroll">
                <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
                    <h4 class="cart_heading fs-md ft-medium mb-0">Products List</h4>
                    <button onclick="closeCart()" class="close_slide"><i class="ti-close"></i></button>
                </div>
                <div class="right-ch-sideBar">

                    <div class="cart_select_items py-2">
                        @foreach ((array)$cart as $it)
                            <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                                <div class="cart_single d-flex align-items-center">
                                    <div class="cart_selected_single_thumb">
                                    </div>
                                    <div class="cart_single_caption pl-2">
                                        <h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: {{$it['ten_sp']}}</h4>
                                        <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Màu sắc: {{$it['color']}}</span></p>
                                        <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Size: {{$it['size']}}</span></p>

                                        <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Số lượng: {{$it['so_luong']}}</span></p>
                                        <h4 class="fs-md ft-medium mb-0 lh-1">Giá: {{$it['gia_thitruong']}}$</h4>
                                    </div>
                                </div>
                                <div class="fls_last"><a href="{{route('deleteCart',[$it['id']])}}"><i class="ti-close"></i></a></div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                        <h6 class="mb-0">Tổng</h6>
                        <h3 class="mb-0 ft-medium">{{$total}}$</h3>
                    </div>

                    <div class="cart_action px-3 py-3">
                        <div class="form-group">
                            <button type="button" class="btn d-block full-width btn-dark">Checkout Now</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn d-block full-width btn-dark-light">Edit or View</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    @endsection
    @section('js')
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function() {
                $(document).on('change','#province_id',function (event) {
                    const url=$(this).data('url')
                    const data=$(this).val();
                    console.log(url,data);
                    $.ajax({
                        type:'GET',
                        url:url,
                        data:{
                            province_id:data
                        },
                        success:function (res) {
                            console.log(res)
                            $('#district_id').html(res.html)
                        }
                    })
                })
                $(document).on('change','#province_id',function (event) {
                    let total=$('#total');
                    const url_shipping=$(this).data('shipping')
                    const dataShip={province_id: $(this).val(),}
                    const shipping_id = $('#shipping_id').val();
                    $.ajax({
                        type:'GET',
                        url:url_shipping,
                        data:dataShip,
                        success:function (res) {
                            console.log(res);
                                total.html(res.total+'$');
                            $('#shipping_id').html(res.shippingFee+'$');
                        }
                    })
                })
                $(document).on('click','#btn-coupon',function (event) {
                    let total=$('#total');
                    let coupon=$('#coupon');
                    const urlCoupon=$('#btn-coupon').data('urlcoupon')
                    let dataCoupon=$('#coupon_code').val()
                    console.log(dataCoupon,urlCoupon),
                    $.ajax({
                        type:'GET',
                        url:urlCoupon,
                        data:{
                            coupon_code:dataCoupon
                        },
                        success:function (res) {
                            if (dataCoupon=true){
                                coupon.html(res.html['coupon_number']+'$');
                                total.html(res.subtotal+'$')
                                console.log(res.html);
                                alert('Bạn đã được giảm giá!')
                            }

                            else {
                                alert('Mã coupon không đúng hoặc chưa nhập!')
                                coupon.html(res.html+'0$');
                                total.html(res.subtotal+'$')
                                console.log(res.html);
                            }
                        },
                        error:function (res) {
                            console.log(res);
                        }
                    })
                })
                }

            )
        </script>
    @endsection

