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
                            <h2>Lịch sử mua hàng</h2>
                        </div>
                    </div>
                </div><br>
{{--                {{dd($historyOrder)}}--}}
                {{--            <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>--}}
                <table class="table">
                    <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Email</th>
{{--                        <th>Tên sản phẩm</th>--}}
                        <td>Địa chỉ nhận hàng</td>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
{{--                        <th>Ngày mua</th>--}}
                        <th>Trạng thái</th>
                        <th>Chi tiết</th>
                        <th>Hủy đơn hàng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($historyOrder as $his)
                    <tr>
                        <td>{{$his->name}}</td>
                        <td>{{$his->email}}</td>
{{--                        <td>{{$his->ten_sp}}</td>--}}
                        <td>{{$his->address}} - {{$his->name_district}} - {{$his->name_province}}</td>
                        <td>{{$his->quantity}}</td>
                        <td>{{$his->total}}$</td>
{{--                        <td>{{$his->created_at}}</td>--}}
                        <td>
                            @if($his->trang_thai==0)
                                <span style="width: 130px" class="btn btn-primary">Chưa duyệt</span>
                            @elseif($his->trang_thai==1)
                                <span style="width: 130px" class="btn btn-success">Đã duyệt</span>
                            @else
                                <span style="width: 130px" class="btn btn-danger">Đã hủy</span>
                            @endif

                        </td>
                        <td>
                            <a href="{{route('client_detail_order',[$his->order_id])}}" style="color: white" class="btn btn-info">Xem chi tiết</a>
                        </td>
                        <td>
                            @if($his->trang_thai==2)
                            @else
                                <form method="post" action="{{route('order.update_order',[$his->id])}}">
                                    @csrf
                                    <input type="text" name="trang_thai" value="2" hidden>
                                    <button onclick="confirm('Bạn đã hủy đơn hàng thành công!')" type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
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
                        @foreach ((array)$cart as $it)
                            <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                                <div class="cart_single d-flex align-items-center">
                                    <div class="cart_selected_single_thumb">
                                    </div>
                                    <div class="cart_single_caption pl-2">
                                        <h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: {{$it['ten_sp']}}</h4>
                                        <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Số lượng: {{$it['so_luong']}}</span></p>
                                        <h4 class="fs-md ft-medium mb-0 lh-1">Giá: {{$it['gia_thitruong']}}$</h4>
                                    </div>
                                </div>
                                                            <div class="fls_last"><a href="{{route('deleteCart',[$it['id']])}}"><i class="ti-close"></i></a></div>
                            </div>
                        @endforeach
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
