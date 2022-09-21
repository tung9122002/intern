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
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="text-center d-block mb-5">
                        <h2>Chi tiết đơn hàng</h2>
                    </div>
                </div>
            </div><br>
{{--            {{dd($detailOrder[0]->id)}}--}}
            {{--            <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>--}}
{{--            <h5>Địa chỉ nhận hàng</h5>--}}
{{--            @foreach(array($detailOrder) as $detail)--}}
{{--                {{dd($detail)}}--}}
{{--            @endforeach--}}
            <table class="table">
                <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tên Sản phẩm</th>
                    <th>Màu sắc</th>
                    <th>Size</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    {{--                        <th>Ngày mua</th>--}}
{{--                    <th>Trạng thái</th>--}}
{{--                    <th>Chi tiết đơn hàng</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($detailOrder as $his)
                    <tr>
                        <td>{{$his->name}}</td>
                        <td>{{$his->ten_sp}}</td>
                        <td style="background-color: {{$his->color}}">
                        </td>
                        <td>{{$his->size}}</td>
                        <td>{{$his->quantity}}</td>
                        <td>{{$his->total}}$</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <h5 style="color: red;text-align: right;margin-right: 400px"> Shipping fee: {{$detailOrder[0]->total_pr+$detailOrder[0]->coupon_number-$tongtien}}$</h5><br>
        <h5 style="color: red;text-align: right;margin-right: 400px"> SubTotal: {{($tongtien)}}$</h5><br>
        @if($detailOrder[0]->coupon_id!=null)
            <h5 style="color: #ff0000;text-align: right;margin-right: 400px"> Coupon: {{($detailOrder[0]->coupon_number)}}$</h5><br>
        @else
            <h5 style="color: #ff0000;text-align: right;margin-right: 400px"> Coupon: 0$</h5><br>
        @endif
        <h4 style="color: red;text-align: right;margin-right: 400px"> Total: {{$detailOrder[0]->total_pr}}$</h4><br>
            <form method="POST" action="{{url('vnp_payment')}}">
                @csrf
                <div class="form-group">
                    <button style="width: 400px; margin-left: 60%" name="redirect" type="submit" class="btn btn-dark btm-md full-width btn btn-info">Thanh Toán VNPAY</button>
                </div>
            </form>

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

{{--                <div class="cart_select_items py-2">--}}
{{--                    @foreach ((array)$cart as $it)--}}
{{--                        <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">--}}
{{--                            <div class="cart_single d-flex align-items-center">--}}
{{--                                <div class="cart_selected_single_thumb">--}}
{{--                                </div>--}}
{{--                                <div class="cart_single_caption pl-2">--}}
{{--                                    <h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: {{$it['ten_sp']}}</h4>--}}
{{--                                    <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Số lượng: {{$it['so_luong']}}</span></p>--}}
{{--                                    <h4 class="fs-md ft-medium mb-0 lh-1">Giá: {{$it['gia_thitruong']}}$</h4>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="fls_last"><a href="{{route('deleteCart',[$it['id']])}}"><i class="ti-close"></i></a></div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="cart_action px-3 py-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <button type="button" class="btn d-block full-width btn-dark">Checkout Now</button>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <button type="button" class="btn d-block full-width btn-dark-light">Edit or View</button>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
        </div>
    </div>

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
@endsection

