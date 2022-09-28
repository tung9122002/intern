<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// đăng nhập
Route::get('login',[\App\Http\Controllers\Auth\LoginController::class,'getLogin'])->name('getLogin');
Route::post('login',[\App\Http\Controllers\Auth\LoginController::class,'postLogin'])->name('postLogin');
Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logOut'])->name('logOut');
// trang chủ
Route::get('shop',[\App\Http\Controllers\Client\ProductController::class,'productList'])->name('productList');

// thêm sản phẩm vào giỏ hàng
Route::get('cart/{id?}',[\App\Http\Controllers\Client\CartController::class,'addCart'])->name('addCart');

// danh sách sản phẩm có trong cart
Route::get('list-cart',[\App\Http\Controllers\Client\CartController::class,'listCart'])->name('listCart');

// Client - checkout - list district
Route::get('district',[\App\Http\Controllers\Client\DistrictController::class,'loadDistrict'])->name('district');
Route::get('att',[\App\Http\Controllers\Admin\ProductController::class,'loadAttribute'])->name('attribute');

//hiển thị phí ship
Route::get('shipping',[\App\Http\Controllers\Client\ShippingFeeController::class,'loadShipping'])->name('shipping');

// client-checkout
Route::get('check-out',[\App\Http\Controllers\Client\CheckOutController::class,'checkOut'])->name('checkOut');
Route::post('check-out',[\App\Http\Controllers\Client\CheckOutController::class,'postCheckOut'])->name('postCheckOut');

// xóa cart
Route::get('deleteCart/{id}',[\App\Http\Controllers\Client\CartController::class,'deleteCart'])->name('deleteCart');

//Client - History Order
Route::get('history/{id}',[\App\Http\Controllers\Client\OrderController::class,'historyOrder'])->name('historyOrder');

//Client - Detail Order
Route::get('detailOrder/{id}',[\App\Http\Controllers\Client\OrderController::class,'detailOrderClient'])->name('client_detail_order');

// Client - Detail Poduct
Route::get('shop-single/{id}',[\App\Http\Controllers\Client\ProductController::class,'shopSingle'])->name('shopSingle');
Route::get('add-rating',[\App\Http\Controllers\Client\RatingController::class,'addRating'])->name('add_rating');
// Client - Coupon
Route::get('check-coupon',[\App\Http\Controllers\Client\CouponController::class,'checkCoupon'])->name('check_coupon');

//client- rating
Route::get('rating/{id}',[\App\Http\Controllers\Client\RatingController::class,'listRating'])->name('list_rating');
//VNPay
Route::get('complete-order/{code}',[\App\Http\Controllers\Client\CheckOutController::class,'completeOrder'])->name('complete_order');
Route::get('IPN',[\App\Http\Controllers\Payment\PaymentController::class,'IPN'])->name('complete_pay');
Route::get('vnp-return',[\App\Http\Controllers\Payment\PaymentController::class,'resultPay'])->name('result_pay');
//admin categories
Route::prefix('danhmuc')->name('danhmuc.')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[\App\Http\Controllers\Admin\CategoryController::class,'add'])->name('danhmuc_add');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('danhmuc_edit');
    Route::post('edit/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('danhmuc_update');

    Route::get('delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('danhmuc_delete');
    Route::get('detail/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'detailCate'])->name('danhmuc_detail');
    Route::get('view-render',[\App\Http\Controllers\Admin\CategoryController::class,'viewRender'])->name('viewRender');
});

//admin product
Route::prefix('sanpham')->name('sanpham.')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\ProductController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[\App\Http\Controllers\Admin\ProductController::class,'add'])->name('sanpham_add');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'edit'])->name('sanpham_edit');
    Route::post('edit/{id}',[\App\Http\Controllers\Admin\ProductController::class,'update'])->name('sanpham_update');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\ProductController::class,'delete'])->name('sanpham_delete');
    Route::get('detail/{id}',[\App\Http\Controllers\Admin\ProductController::class,'detail'])->name('detail_sanpham');
    Route::post('detail/{id}',[\App\Http\Controllers\Admin\ProductController::class,'detailUpdate'])->name('detail_update');
    Route::post('update-product-att',[\App\Http\Controllers\Admin\ProductController::class,'updateProductAtt'])->name('update_product_att');
    Route::get('update-product-price',[\App\Http\Controllers\Admin\ProductController::class,'updateProductPrice']);
    Route::get('update-product-inventory',[\App\Http\Controllers\Admin\ProductController::class,'updateProductInventory']);
    Route::post('update-product-status/{id}',[\App\Http\Controllers\Admin\ProductController::class,'updateProductStatus'])->name('update-product-status');
});
//admin user
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('index');
});
//admin customer
Route::prefix('khach-hang')->name('khach-hang.')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\CustomerController::class,'index'])->name('index');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\CouponController::class,'delete'])->name('delete_khachhang');
});

//admin order
Route::prefix('order')->name('order.')->group(function(){
    Route::get('/',[\App\Http\Controllers\Admin\OrderController::class,'index'])->name('index');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\OrderController::class,'delete'])->name('delete_order');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\OrderController::class,'edit'])->name('edit_order');
    Route::post('edit/{id}',[\App\Http\Controllers\Admin\OrderController::class,'update'])->name('update_order');
    Route::get('detail/{id}',[\App\Http\Controllers\Admin\OrderController::class,'detailOrder'])->name('detail_order');

});


//admin shippingfee
Route::prefix('ship')->name('ship.')->group(function (){
    Route::get('/',[\App\Http\Controllers\Admin\ShippingFeeController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[\App\Http\Controllers\Admin\ShippingFeeController::class,'add'])->name('add_ship');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\ShippingFeeController::class,'edit'])->name('edit_ship');
    Route::post('edit/{id}',[\App\Http\Controllers\Admin\ShippingFeeController::class,'update'])->name('update_ship');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\ShippingFeeController::class,'delete'])->name('delete_ship');
});


// admin coupon
Route::prefix('coupon')->name('coupon.')->group(function (){
    Route::get('/',[\App\Http\Controllers\Admin\CouponController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[\App\Http\Controllers\Admin\CouponController::class,'add'])->name('add_coupon');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\CouponController::class,'delete'])->name('delete_coupon');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\CouponController::class,'edit'])->name('edit_coupon');
    Route::post('edit/{id}',[\App\Http\Controllers\Admin\CouponController::class,'update'])->name('update_coupon');
    Route::get('send-mail',[\App\Http\Controllers\Admin\CouponController::class,'sendMail'])->name('sendMail');
});


// admin attribute
Route::prefix('attribute')->name('attribute.')->group(function (){
    Route::get('/',[\App\Http\Controllers\Admin\AttributeController::class,'index'])->name('index');
    Route::get('detail/{name}',[\App\Http\Controllers\Admin\AttributeController::class,'DetailAtt'])->name('detail_att');
    Route::get('edit/{id}',[\App\Http\Controllers\Admin\AttributeController::class,'edit'])->name('edit_attribute');
    Route::post('edit/{id}',[\App\Http\Controllers\Admin\AttributeController::class,'update'])->name('update_attribute');
    Route::match(['get','post'],'add',[\App\Http\Controllers\Admin\AttributeController::class,'add'])->name('add_att');
    Route::get('delete/{id}',[\App\Http\Controllers\Admin\AttributeController::class,'deleteAtt'])->name('delete_att');

});


//thanh toán VNPAY
Route::get('payment',[\App\Http\Controllers\Payment\PaymentController::class,'payment'])->name('getPayment');
Route::post('vnp_payment/{code}',[\App\Http\Controllers\Payment\PaymentController::class,'vnpPayment'])->name('payment');
