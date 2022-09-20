 {{dd($rend)}}
<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12">
<div class="row align-items-center rows-products">
    <!-- Single -->
    @foreach ($rend as $item)
    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
        <div class="product_grid card b-0">
            <div class="badge bg-info text-white position-absolute ft-regular ab-left text-upper">New</div>
            <div class="card-body p-0">
                <div class="shop_thumb position-relative">
                    <a class="card-img-top d-block overflow-hidden" href="shop-single-v1.html"><img class="card-img-top" src="{{asset('assets/img/product/12.jpg')}} " alt="..."></a>
                    <div class="product-hover-overlay bg-dark d-flex align-items-center justify-content-center">
                        <div class="edlio"><a data-id='{{$item->id}}' data-gia='{{$item->gia_thitruong}}' data-ten='{{$item->ten_sp}}' data-url="{{route('addCart',$item->id)}}" class="text-white fs-sm ft-medium addCart" ><i class=""></i>Add Cart</a></div>
                    </div>
                </div>
            </div>
            <div class="card-footer b-0 p-0 pt-2 bg-white">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="text-left">
                        <div class="form-check form-option form-check-inline mb-1">
                            <input class="form-check-input" type="radio" name="color2" id="white2">
                            <label class="form-option-label small rounded-circle" for="white2"><span class="form-option-color rounded-circle blc5"></span></label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-1">
                            <input class="form-check-input" type="radio" name="color2" id="blue2">
                            <label class="form-option-label small rounded-circle" for="blue2"><span class="form-option-color rounded-circle blc2"></span></label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-1">
                            <input class="form-check-input" type="radio" name="color2" id="yellow2">
                            <label class="form-option-label small rounded-circle" for="yellow2"><span class="form-option-color rounded-circle blc6"></span></label>
                        </div>
                        <div class="form-check form-option form-check-inline mb-1">
                            <input class="form-check-input" type="radio" name="color2" id="pink2">
                            <label class="form-option-label small rounded-circle" for="pink2"><span class="form-option-color rounded-circle blc4"></span></label>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn auto btn_love snackbar-wishlist"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="text-left">
                    <h5 class="fw-bolder fs-md mb-0 lh-1 mb-1"><a href="shop-single-v1.html">{{$item->ten_sp}}</a></h5>
                    <div class="elis_rty"><span class="ft-bold text-dark fs-sm">{{$item->gia_thitruong}}S</span></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
