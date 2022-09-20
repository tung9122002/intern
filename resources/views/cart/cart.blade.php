{{--{{dd($cart)}}--}}
@foreach($cart as $item)
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
        <div class="fls_last"><button class="close_slide gray"><i class="ti-close"></i></button></div>
    </div>
@endforeach
