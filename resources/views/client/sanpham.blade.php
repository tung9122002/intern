
@php
    $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp
@extends('templates.layout')
    @section('content')

        <!-- ======================= Shop Style 1 ======================== -->
        <section class="bg-cover" style="background:url({{asset('assets/img/banner-2.png')}}) no-repeat;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="text-left py-5 mt-3 mb-3">
                            <h1 class="ft-medium mb-3">Shop</h1>
                            <ul class="shop_categories_list m-0 p-0">
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Speakers</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======================= Shop Style 1 ======================== -->


        <!-- ======================= Filter Wrap Style 1 ======================== -->
        <section class="py-3 br-bottom br-top">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Women's</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- ============================= Filter Wrap ============================== -->


        <!-- ======================= All Product List ======================== -->
        <section class="middle">
            <div class="container">
                <div class="row">

                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 p-xl-0">
                        <div class="search-sidebar sm-sidebar border">
                            <div class="search-sidebar-body">

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header px-3">
                                        <h4 class="mt-3">Categories</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="side-list no-border">
                                            <div class="filter-card" id="shop-categories">
                                            {{-- {{dd($countProduct)}} --}}
                                            <!-- Single Filter Card -->
                                                <div class="single_filter_card">
                                                    {{-- <h5><a href="#clothing" data-toggle="collapse" class="" aria-expanded="false" role="button"><i class="accordion-indicator ti-angle-down"></i></a></h5> --}}
                                                    @foreach ($cate as $item)
                                                        <div class="collapse show" id="clothing" data-parent="#shop-categories">
                                                            <div class="card-body">
                                                                <div class="inner_widget_link">
                                                                    <ul>
                                                                        <li><a href="{{url('shop?id_danhmuc='.$item->id)}}">{{$item->char.''.$item->ten_danhmuc}}</a></li>
                                                                        {{-- <li><a data-url="{{route('productList')}}"><span></span>{{$item->char.''.$item->ten_danhmuc}}</a></li>	 --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#size" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Size</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="size" data-parent="#size">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="text-left pb-0 pt-2">
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="26s">
                                                            <label class="form-option-label" for="26s">26</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="28s">
                                                            <label class="form-option-label" for="28s">28</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="30s" checked>
                                                            <label class="form-option-label" for="30s">30</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="32s">
                                                            <label class="form-option-label" for="32s">32</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="34s">
                                                            <label class="form-option-label" for="34s">34</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="36s">
                                                            <label class="form-option-label" for="36s">36</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="38s">
                                                            <label class="form-option-label" for="38s">38</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="40s">
                                                            <label class="form-option-label" for="40s">40</label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-2">
                                                            <input class="form-check-input" type="radio" name="sizes" id="42s">
                                                            <label class="form-option-label" for="42s">42</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#brands" data-toggle="collapse" aria-expanded="false" role="button">Brands</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse show" id="brands" data-parent="#brands">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list">
                                                            <li>
                                                                <input id="b1" class="checkbox-custom" name="b1" type="checkbox">
                                                                <label for="b1" class="checkbox-custom-label">Sumsung<span>142</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="b2" class="checkbox-custom" name="b2" type="checkbox">
                                                                <label for="b2" class="checkbox-custom-label">Apple<span>652</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="b3" class="checkbox-custom" name="b3" type="checkbox">
                                                                <label for="b3" class="checkbox-custom-label">Nike<span>232</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="b4" class="checkbox-custom" name="b4" type="checkbox">
                                                                <label for="b4" class="checkbox-custom-label">Reebok<span>192</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="b5" class="checkbox-custom" name="b5" type="checkbox">
                                                                <label for="b5" class="checkbox-custom-label">Hawai<span>265</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#gender" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Gender</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="gender" data-parent="#gender">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list">
                                                            <li>
                                                                <input id="g1" class="checkbox-custom" name="g1" type="checkbox">
                                                                <label for="g1" class="checkbox-custom-label">All<span>22</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="g2" class="checkbox-custom" name="g2" type="checkbox">
                                                                <label for="g2" class="checkbox-custom-label">Male<span>472</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="g3" class="checkbox-custom" name="g3" type="checkbox">
                                                                <label for="g3" class="checkbox-custom-label">Female<span>170</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#discount" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Discount</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="discount" data-parent="#discount">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list">
                                                            <li>
                                                                <input id="d1" class="checkbox-custom" name="d1" type="checkbox">
                                                                <label for="d1" class="checkbox-custom-label">80% Discount<span>22</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="d2" class="checkbox-custom" name="d2" type="checkbox">
                                                                <label for="d2" class="checkbox-custom-label">60% Discount<span>472</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="d3" class="checkbox-custom" name="d3" type="checkbox">
                                                                <label for="d3" class="checkbox-custom-label">50% Discount<span>170</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="d4" class="checkbox-custom" name="d4" type="checkbox">
                                                                <label for="d4" class="checkbox-custom-label">40% Discount<span>170</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#types" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Type</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="types" data-parent="#types">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list">
                                                            <li>
                                                                <input id="t1" class="checkbox-custom" name="t1" type="checkbox">
                                                                <label for="t1" class="checkbox-custom-label">All Type<span>422</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="t2" class="checkbox-custom" name="t2" type="checkbox">
                                                                <label for="t2" class="checkbox-custom-label">Normal Type<span>472</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="t3" class="checkbox-custom" name="t3" type="checkbox">
                                                                <label for="t3" class="checkbox-custom-label">Simple Type<span>170</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="t4" class="checkbox-custom" name="t4" type="checkbox">
                                                                <label for="t4" class="checkbox-custom-label">Modern type<span>140</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#occation" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Occation</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="occation" data-parent="#occation">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="inner_widget_link">
                                                        <ul class="no-ul-list">
                                                            <li>
                                                                <input id="o1" class="checkbox-custom" name="o1" type="checkbox">
                                                                <label for="o1" class="checkbox-custom-label">All Occation<span>422</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="o2" class="checkbox-custom" name="o2" type="checkbox">
                                                                <label for="o2" class="checkbox-custom-label">Normal Occation<span>472</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="t33" class="checkbox-custom" name="o33" type="checkbox">
                                                                <label for="t33" class="checkbox-custom-label">Winter Occation<span>170</span></label>
                                                            </li>
                                                            <li>
                                                                <input id="o4" class="checkbox-custom" name="o4" type="checkbox">
                                                                <label for="o4" class="checkbox-custom-label">Summer Occation<span>140</span></label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Option -->
                                <div class="single_search_boxed">
                                    <div class="widget-boxed-header">
                                        <h4><a href="#colors" data-toggle="collapse" class="collapsed" aria-expanded="false" role="button">Colors</a></h4>
                                    </div>
                                    <div class="widget-boxed-body collapse" id="colors" data-parent="#colors">
                                        <div class="side-list no-border">
                                            <!-- Single Filter Card -->
                                            <div class="single_filter_card">
                                                <div class="card-body pt-0">
                                                    <div class="text-left">
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="colora8" id="whitea8">
                                                            <label class="form-option-label rounded-circle" for="whitea8"><span class="form-option-color rounded-circle blc7"></span></label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="colora8" id="bluea8">
                                                            <label class="form-option-label rounded-circle" for="bluea8"><span class="form-option-color rounded-circle blc2"></span></label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="colora8" id="yellowa8">
                                                            <label class="form-option-label rounded-circle" for="yellowa8"><span class="form-option-color rounded-circle blc5"></span></label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="colora8" id="pinka8">
                                                            <label class="form-option-label rounded-circle" for="pinka8"><span class="form-option-color rounded-circle blc3"></span></label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="colora8" id="reda">
                                                            <label class="form-option-label rounded-circle" for="reda"><span class="form-option-color rounded-circle blc4"></span></label>
                                                        </div>
                                                        <div class="form-check form-option form-check-inline mb-1">
                                                            <input class="form-check-input" type="radio" name="colora8" id="greena">
                                                            <label class="form-option-label rounded-circle" for="greena"><span class="form-option-color rounded-circle blc6"></span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="border mb-3 mfliud">
                                    <div class="row align-items-center py-2 m-0">
                                        <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                            <h6 class="mb-0">Sản phẩm: {{count($listSp)}}</h6>
                                        </div>

                                        <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
                                            <div class="filter_wraps d-flex align-items-center justify-content-end m-start">
                                                <div class="single_fitres mr-2 br-right">
                                                    <select class="custom-select simple" name="id_danhmuc" id="id_dm">
                                                        <option value="" selected="" >Danh Mục</option>
                                                        @foreach ($cate as $item)
                                                            <option value="{{$item->id}}">{{$item->char.''.$item->ten_danhmuc}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="single_fitres">
                                                    <button id="btn_search" data-url="{{route('productList')}}" class="simple-button active mr-1" type="submit">Tìm Kiếm</button>
                                                    {{-- <a href="shop-style-5.html" class="simple-button active mr-1" type="submit">Tìm Kiếm</a> --}}
                                                    {{-- <a href="shop-list-sidebar.html" class="simple-button"><i class="ti-view-list"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- row -->
                        <div class="row align-items-center rows-products">
                            <!-- Single -->
{{--                            {{dd($list,$listSp)}}--}}
                            @foreach ($listSp as $item)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                    <div class="product_grid card b-0">
                                        <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div>
                                        <div class="card-body p-0">
                                            <div class="shop_thumb position-relative">
                                                <a class="card-img-top d-block overflow-hidden" href="{{route('shopSingle',[$item->id])    }}"><img class="card-img-top" src="{{asset('assets/img/product/12.jpg')}} " alt="..."></a>
                                                <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                                                    <div class="edlio"><a data-id='{{$item->id}}' data-gia='{{$item->gia_thitruong}}' data-ten='{{$item->ten_sp}}' data-url="{{route('addCart',$item->id)}}" class="text-white fs-sm ft-medium addCart" ><i class=""></i>Add Cart</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer b-0 p-0 pt-2 bg-white">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <div class="text-left">
{{--                                                    {{dd($listSp)}}--}}
                                                    @php
                                                        $attribute=[];
                                                    @endphp
                                                    @foreach($query as $it)
                                                        @if($it->id_product==$item->id)
                                                            @php
                                                            $attribute[]=$it
                                                            @endphp
                                                        @endif
                                                    @endforeach

{{--                                                    @foreach($attribute as $att)--}}
{{--                                                        @if($att->name=='color')--}}
{{--                                                            <div class="form-check form-option form-check-inline mb-1">--}}
{{--                                                                <input class="form-check-input color" type="radio" value="{{$att->value}}" name="color" id="color{{$att->id_attribute.$att->id_product}}">--}}
{{--                                                                <label class="form-option-label small rounded-circle" for="color{{$att->id_attribute.$att->id_product}}">--}}
{{--                                                                    <span style="background-color:{{$att->value}}" class="form-option-color rounded-circle blc6"></span></label>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
                                                    <br>
{{--                                                    @foreach($attribute as $att)--}}
{{--                                                        @if($att->name=='size')--}}
{{--                                                            <div class="form-check form-option form-check-inline mb-1">--}}
{{--                                                                <input class="form-check-input size" type="radio" value="{{$att->value}}" name="size" id="size{{$att->id_attribute.$att->id_product}}">--}}
{{--                                                                <label class="form-option-label small rounded-circle" for="size{{$att->id_attribute.$att->id_product}}">--}}
{{--                                                                    <span class="rounded-circle">{{$att->value}}</span></label>--}}
{{--                                                            </div>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
                                                </div>

                                                <div class="text-right">
                                                    <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button>
                                                </div>

                                            </div>
                                            <div class="text-left">
                                                <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">{{$item->ten_sp}}</a></h5>
                                                <div class="elis_rty"><span class="ft-bold text-dark fs-sm">Giá: {{$item->gia_thitruong}}$</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                        <!-- row -->

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 text-center">
                                <a href="#" class="btn stretched-link borders m-auto"><i class="lni lni-reload mr-2"></i>Load More</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ======================= All Product List ======================== -->

        <!-- ======================= Customer Features ======================== -->
        <section class="px-0 py-3 br-top">
            <div class="container">
                <div class="row">

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="d-flex align-items-center justify-content-start py-2">
                            <div class="d_ico">
                                <i class="fas fa-shopping-basket"></i>
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
                                <i class="far fa-credit-card"></i>
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
                                <i class="fas fa-shield-alt"></i>
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
                                <i class="fas fa-headphones-alt"></i>
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
{{--                     {{dd($cart)}}--}}
                    <div class="cart_select_items py-2 showCart">
                        @foreach ((array)$cart as $item)
                            <div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
                                <div class="cart_single d-flex align-items-center">
                                    <div class="cart_selected_single_thumb">
                                    </div>
                                    <div class="cart_single_caption pl-2">
                                        <h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: {{$item['ten_sp']}}</h4>
                                        <p class="mb-2"><span class="text-dark ft-medium small"></span>Màu sắc: <span class="text-dark small" style="background-color: {{$item['color']}}">{{$item['color']}}</span></p>
                                        <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Size: {{$item['size']}}</span></p>
                                        <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Số lượng: {{$item['so_luong']}}</span></p>
                                        <h4 class="fs-md ft-medium mb-0 lh-1">Giá: {{number_format(($item['gia_thitruong']))}} VNĐ</h4>
                                    </div>
                                </div>

                                <div class="fls-last">
                                    <a href="{{route('deleteCart',[$item['id'].$item['color'].$item['size']])}}"><i class="ti-close"></i></a>
                                </div>
                                {{-- <div class="fls_last"><a href="{{route('deleteCart',[$item['id']])}}"></a><i class="ti-close"></i></div> --}}
                                {{-- <div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i>{{route('deleteCart',[$item->id])}}</button></div> --}}
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex align-items-center justify-content-between br-top br-bottom px-3 py-3">
                        {{-- <h6 class="mb-0">Tổng</h6>
                        <h3 class="mb-0 ft-medium">{{$total}}$</h3> --}}
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
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {
                const products = $('.showCart');
                // console.log($('.addCart'))
                $('.addCart').click(function(e){
                    // $(document).on('click','.addCart',function(e){
                    e.preventDefault();
                    const elementParent=$(this).parent().parent().parent().parent().parent();
                    const checkColor=elementParent.find('.color:checked')
                    const checkSize=elementParent.find('.size:checked')
                    console.log(checkColor,checkSize);
                    const url = $(this).data('url');
                    const id = $(this).data('id');
                    const gia = $(this).data('gia');
                    const ten_sp = $(this).data('ten');
                    let countCart=$('#countCart');
                    if (checkColor==null && checkSize==null){
                        console.log('Heelo');
                        alert('Bạn phải chọn thuộc tính');
                    }
                    else {
                        const color=checkColor.val();
                        const size=checkSize.val();
                        $.ajax({
                            type: 'GET',
                            url: url,
                            data: {
                                id: id,
                                quantity:1,
                                gia_thitruong:gia,
                                ten_sp:ten_sp,
                                color:color,
                                size:size,
                            },

                            success: function (res) {
                                console.log(color,size);
                                // $('.showCart').empty().html(res.html);
                                console.log(Object.values([res][0]));
                                let cart=Object.values([res][0]);
                                countCart.html(cart.length)
                                let htmls = cart.map(function (item,key) {
                                    // const array=Object.entries(item);

                                    return `
								<div class="d-flex align-items-center justify-content-between br-bottom px-3 py-3">
								<div class="cart_single d-flex align-items-center">
									<div class="cart_selected_single_thumb">
									</div>
									<div class="cart_single_caption pl-2">
										<h4 class="product_title fs-sm ft-medium mb-0 lh-1">Tên: ${item.ten_sp}</h4>
                                            <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Màu sắc: ${item.color}</span></p>
                                            <p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Size: ${item.size}</span></p>
										<p class="mb-2"><span class="text-dark ft-medium small"></span><span class="text-dark small">Số lượng: ${item.so_luong}</span></p>
										<h4 class="fs-md ft-medium mb-0 lh-1">Giá: ${item.gia_thitruong}</h4>
									</div>
								</div>
								<div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i></button></div>
							</div>


                                `
                                })

                                products.html(htmls.join(' '));
                                console.log(products.html());
                            },
                            error: function (res) {
                                console.log('Lỗi');
                            }
                        })
                    }
                    }
                )}
        )
    </script>
    <script>
        $(document).ready(function() {
            const products = $('.rows-products');
            $(document).on('click','#btn_search',function(e){
                e.preventDefault();
                const urlSearch = $(this).data('url');
                const idDm = $('#id_dm').val();
                console.log(idDm);
                $.ajax({
                    type: 'GET',
                    url: urlSearch,
                    data: {
                        id_danhmuc: idDm
                    },
                    success: function (res) {
                        console.log(res)
                        // let htmls = [res].map(function (item,key) {
                            $('.rows-products').empty().html(res.html);
                            console.log(item)
                        // })

                        // products.html(htmls.join(' '));
                        console.log(products.html());
                    },
                    error: function (res) {
                        console.log('Lỗi');
                    }
                })

            })
        })
    </script>
    <script>
        function openWishlist() {
            document.getElementById("Wishlist").style.display = "block";
        }
        function closeWishlist() {
            document.getElementById("Wishlist").style.display = "none";
        }
    </script>

    <script>
        function openCart() {
            document.getElementById("Cart").style.display = "block";
        }
        function closeCart() {
            document.getElementById("Cart").style.display = "none";
        }
    </script>

    <script>
        function openSearch() {
            document.getElementById("Search").style.display = "block";
        }
        function closeSearch() {
            document.getElementById("Search").style.display = "none";
        }
    </script>
@endsection
