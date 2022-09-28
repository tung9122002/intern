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
                            <li class="breadcrumb-item active" aria-current="page">Lịch sử mua hàng</li>
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
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                    <!-- Icon -->
                    <div class="p-4 d-inline-flex align-items-center justify-content-center circle bg-light-success text-success mx-auto mb-4"><i class="lni lni-heart-filled fs-lg"></i></div>
                    <!-- Heading -->
                    <h2 class="mb-2 ft-bold">Đơn hàng của bạn đã hoàn thành !</h2>
                    <h4 class="mb-2 ft-bold">Cảm ơn <span class="text-body text-dark">{{$data->name}}</span> đã cho shop cơ hội được phục vụ !</h4>
                    <br>
{{--                                        {{dd($data)}}--}}
                    <div style="border: 1px solid #CBC8C8;background:#CBC8C8;border-radius: 10px;color:orangered">
                        <p style="margin: 20px;text-align: left" class="mb-2 ft-bold">Đơn hàng: <span class="text-body text-dark">{{$data->code_order}}#</span></p>

                        <p style="margin: 20px;text-align: left" class="mb-2 ft-bold">Người nhận hàng: <span class="text-body text-dark">{{$data->name}} - {{$data->phone}}</span></p>
                        <p style="margin: 20px;text-align: left" class="mb-2 ft-bold">Địa chỉ nhận hàng: <span class="text-body text-dark">{{$data->address}} - {{$data->name_district}} - {{$data->name_province}}</span></p>

                        <p style="margin: 20px;text-align: left" class="mb-2 ft-bold">Tổng tiền: <span class="text-body text-dark">{{number_format($data->total_pr)}} VNĐ</span></p>

                    </div><br>
                    <!-- Text -->
                    <p class="ft-regular fs-md mb-5">Đơn hàng <span class="text-body text-dark">{{$code}}#</span> đã hoàn thành. Chi tiết đơn hàng của bạn được hiển thị cho tài khoản cá nhân của bạn.</p>
                    <!-- Button -->
                    <form action="{{route('payment',[$data->code_order])}}" method="post">
                        @csrf
{{--                        <input type="text" name="paid" value="{{$data->paid}}" hidden>--}}
                        <input type="text" name="total_pr" value="{{$data->total_pr}}" hidden>
                        <input type="text" name="code_order" value="{{$data->code_order}}" hidden>
                        <input type="text" name="id" value="{{$data->id}}" hidden>
                        <div class="form-group">
                            <button type="submit" id="btn-payment" name="redirect" class="btn btn-dark btm-md full-width">Thanh Toán VNPAY</button>
                        </div>
                    </form>
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


    </div>
@endsection

