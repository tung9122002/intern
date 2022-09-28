@php
    $objUser = \Illuminate\Support\Facades\Auth::user();
@endphp
@extends('templates.layout')
@section('content')
    <style>
        .star-style {
            background-repeat: no-repeat;
            width: 115%;
            height: 100%;
            margin-left: -7px;
        }
        .rating {
            position: absolute;
            top: -1px;
            left: 0;
        }
        .star-vote   {
            width: 100px;
            height: 20px;
            position: relative;
            margin-right: 10px;
            margin-left: 10px;
        }
        .star{
            margin: 5px;
            height: 20px;
        }
        .single_capt_left{
            border-bottom: 1px solid red;
            width: 1000px;
            font-size: 20px;
        }
    </style>
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
                        {{--                    {{dd($loadOne,$query,$listAtt)}}--}}
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="prd_details">
{{--                                <div class="prt_01 mb-1"><span class="text-purple bg-light-purple rounded py-1">{{$loadOne->ten_danhmuc}}</span></div>--}}
                                <div class="prt_02 mb-3">
                                    <h2 class="ft-bold mb-1">{{count($listRating)}} đánh giá sản phẩm {{$listRating[0]->ten_sp}}</h2>
                                    <div class="text-left">
{{--                                        <img src="{{asset('assets/img/product/15.png')}}" width="100px" alt="">--}}
                                        <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                            @if($rating==null)
                                                <span> Sản phẩm chưa có đánh giá</span>
                                            @else
                                                <span>{{(number_format($rating,1))}}/5 </span>
                                                <div class="star-vote">
                                                    <div class="star-style rating"
                                                         style="background-image: url(https://meter.com.vn//static/imgs/5star1.png); width:{{($rating *100/5)+12}}%"></div>
                                                    <div class="star-style star_background"
                                                         style="background-image: url(https://meter.com.vn//static/imgs/5star2.png);"></div>
                                                </div>

                                                <span class="small">({{count($listRating)}} Đánh giá)</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <section class="middle">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-11 col-lg-12 col-md-12 col-sm-12">
                            <ul class="nav nav-tabs b-0 d-flex align-items-center justify-content-center simple_tab_links mb-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#reviews" id="reviews-tab" data-toggle="tab" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Reviews Content -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                    <div class="reviews_info">
                                        @foreach($listRating as $ratingId)
                                            <div class="single_rev d-flex align-items-start br-bottom py-3">
                                                {{--                                                <div class="single_rev_thumb"><img src="assets/img/team-1.jpg" class="img-fluid circle" width="90" alt="" /></div>--}}
                                                <div class="single_rev_caption d-flex align-items-start pl-3">
                                                    <div class="single_capt_left">
                                                        <h5 class="mb-0 fs-md ft-medium lh-1"><span style="color: red">Người gửi:</span> {{$ratingId->name}}</h5>
                                                        <div class="star">
                                                            <div class="star-rating align-items-center d-flex justify-content-left mb-1 p-0">
                                                                @for($i=1;$i<=$ratingId->rating;$i++)
                                                                    <i class="fas fa-star filled"></i>
                                                                @endfor
                                                            </div>
                                                        </div>
                                                        <p style="color: red">Ngày gửi:<span class="small"> {{$ratingId->start_time}}</span></p>
                                                        <p><span style="color: red">Nội dung:</span> {{$ratingId->description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


        </div>
        @endsection

