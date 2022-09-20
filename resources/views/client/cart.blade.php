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
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
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
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-lg-7 col-md-12">
                    <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x mb-4">
                        {{-- {{dd($array)}} --}}
                        @foreach ((array)$cart as $it)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <!-- Image -->
                                        <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html">
                                            <img class="card-img-top" style="width: 150px" src="{{asset('assets/img/product/12.jpg')}}" alt="..." >
                                        </a>
                                    </div>
                                    <div class="col d-flex align-items-center justify-content-between">
                                        <div class="cart_single_caption pl-2">

                                            <h4 class="product_title fs-md ft-medium mb-1 lh-1">Tên sản phẩm:  {{$it['ten_sp']}}</h4>
                                            <p class="mb-2 lh-2"><span class="text-dark">Màu sắc: {{$it['color']}}</span></p>
                                            <p class="mb-2 lh-2"><span class="text-dark">Size: {{$it['size']}}</span></p>

                                            <p class="mb-1 lh-1"><span class="text-dark">Số lượng: {{$it['so_luong']}}</span></p>
                                            {{-- <p class="mb-3 lh-1"><span class="text-dark">Color: Blue</span></p> --}}
                                            <h4 class="fs-md ft-medium mb-3 lh-1">Giá: {{$it['gia_thitruong']}}$</h4>
                                            {{--												 <select class="mb-2 custom-select w-auto">--}}
                                            {{--												  <option value="1" selected="" name="quantity">1</option>--}}
                                            {{--												  <option value="2" name="quantity">2</option>--}}
                                            {{--												  <option value="3" name="quantity">3</option>--}}
                                            {{--												  <option value="4" name="quantity">4</option>--}}
                                            {{--												  <option value="5" name="quantity">5</option>--}}
                                            {{--												</select>--}}
                                        </div>
                                        <div class="fls_last">
                                            <a href="{{route('deleteCart',[$it['id']])}}"><i class="ti-close"></i></a>
                                            {{-- <i class="ti-close"><a href="{{route('deleteCart',[$it['id']])}}"></a></i></div> --}}
                                            {{-- <div class="fls_last"><button class="close_slide gray"><i class="ti-close"><a href="{{route('deleteCart',[$it['id']])}}"></a></i></button></div> --}}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                    <div class="row align-items-end justify-content-between mb-10 mb-md-0">
                        <div class="col-12 col-md-7">
                            <!-- Coupon -->
                            <form class="mb-7 mb-md-0">
                                <label class="fs-sm ft-medium text-dark">Coupon code:</label>
                                <div class="row form-row">
                                    <div class="col">
                                        <input class="form-control" type="text" placeholder="Enter coupon code*">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-dark" type="submit">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12 col-md-auto mfliud">
                            <button type="submit" class="btn stretched-link borders">Update Cart</button>
                        </div>


                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card mb-4 gray mfliud">
                        <div class="card-body">
                            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                                {{-- <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                  <span>Subtotal</span> <span class="ml-auto text-dark ft-medium"></span>
                                </li>
                                <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                  <span>Tax</span> <span class="ml-auto text-dark ft-medium">$10.10</span>
                                </li> --}}
                                <li class="list-group-item d-flex text-dark fs-sm ft-regular">
                                    <span>Tổng</span> <span class="ml-auto text-dark ft-medium">{{$total}}$</span>
                                </li>
                                <li class="list-group-item fs-sm text-center">
                                    Shipping cost calculated at Checkout *
                                </li>
                            </ul>

                        </div>
                    </div>

                    <a class="btn btn-block btn-dark mb-3" href="{{route('checkOut')}}">Proceed to Checkout</a>

                    <a class="btn-link text-dark ft-medium" href="shop.html">
                        <i class="ti-back-left mr-2"></i> Continue Shopping
                    </a>
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
    <div class="w3-ch-sideBar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="Cart">
        <div class="rightMenu-scroll">
            <div class="d-flex align-items-center justify-content-between slide-head py-3 px-3">
                <h4 class="cart_heading fs-md ft-medium mb-0">Products List</h4>
                <button onclick="closeCart()" class="close_slide"><i class="ti-close"></i></button>
            </div>
            <div class="right-ch-sideBar">

                <div class="cart_select_items py-2">
                    <!-- Single Item -->
                    @foreach ((array)$cart as $item)
                        <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                            <div class="cart_single d-flex align-items-center">
                                <div class="cart_selected_single_thumb">
                                </div>
                                <div class="cart_single_caption pl-2">
                                    <h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: {{$item['ten_sp']}}</h4>
                                    <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Màu sắc: {{$item['color']}}</span></p>
                                    <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Size: {{$item['size']}}</span></p>
                                    <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Số lượng: {{$item['so_luong']}}</span></p>

                                    <h4 class="fs-md ft-medium mb-0 lh-1">Giá: {{$item['gia_thitruong']}}$</h4>
                                </div>
                            </div>
                            <div class="fls_last"><a href="{{route('deleteCart',[$item['id']])}}"><i class="ti-close"></i></a></div>
                        </div>
                    @endforeach

                </div>

                <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                    <h6 class="mb-0">Subtotal</h6>
                    <h3 class="mb-0 ft-medium">{{$total}}$</h3>
                </div>

                <div class="cart_action px-3 py-3">
                    <div class="form-group">
                        <a href="{{route('checkOut')}}"><button type="button" class="btn d-block full-width btn-dark">Checkout Now</button></a>
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
