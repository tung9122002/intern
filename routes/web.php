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
// Route::get('view',[DanhMucController::class,'view'])->name('view');
// Route::post('view-render',[DanhMucController::class,'viewRender'])->name('viewRender');
Route::get('login',[\App\Http\Controllers\Auth\LoginController::class,'getLogin'])->name('getLogin');
Route::post('login',[\App\Http\Controllers\Auth\LoginController::class,'postLogin'])->name('postLogin');
Route::get('logout',[\App\Http\Controllers\Auth\LoginController::class,'logOut'])->name('logOut');
Route::get('shop',[SanPhamController::class,'productList'])->name('productList');
Route::get('cart/{id?}',[SanPhamController::class,'addCart'])->name('addCart');
Route::get('list-cart',[SanPhamController::class,'listCart'])->name('listCart');
Route::get('district',[\App\Http\Controllers\DistrictController::class,'loadDistrict'])->name('district');
Route::get('att',[\App\Http\Controllers\SanPhamController::class,'loadAttribute'])->name('attribute');
Route::get('shipping',[\App\Http\Controllers\ShippingFeeControlle::class,'loadShipping'])->name('shipping');
Route::get('check-out',[SanPhamController::class,'checkOut'])->name('checkOut');
Route::post('check-out',[SanPhamController::class,'postCheckOut'])->name('postCheckOut');
Route::get('deleteCart/{id}',[SanPhamController::class,'deleteCart'])->name('deleteCart');
Route::get('history/{id}',[OrderController::class,'historyOrder'])->name('historyOrder');
Route::get('detailOrder/{id}',[OrderController::class,'detailOrderClient'])->name('client_detail_order');
Route::get('shop-single/{id}',[SanPhamController::class,'shopSingle'])->name('shopSingle');
Route::prefix('danhmuc')->name('danhmuc.')->group(function(){
    Route::get('/',[DanhMucController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[DanhMucController::class,'add'])->name('danhmuc_add');
    Route::get('edit/{id}',[DanhMucController::class,'edit'])->name('danhmuc_edit');
    Route::post('edit/{id}',[DanhMucController::class,'update'])->name('danhmuc_update');

    Route::get('delete/{id}',[DanhMucController::class,'delete'])->name('danhmuc_delete');
    Route::get('detail/{id}',[DanhMucController::class,'detailCate'])->name('danhmuc_detail');
    Route::get('view-render',[DanhMucController::class,'viewRender'])->name('viewRender');
});
Route::prefix('sanpham')->name('sanpham.')->group(function(){
    Route::get('/',[SanPhamController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[SanPhamController::class,'add'])->name('sanpham_add');
    Route::get('edit/{id}',[SanPhamController::class,'edit'])->name('sanpham_edit');
    Route::post('edit/{id}',[SanPhamController::class,'update'])->name('sanpham_update');
    Route::get('delete/{id}',[SanPhamController::class,'delete'])->name('sanpham_delete');
    Route::get('detail/{id}',[SanPhamController::class,'detail'])->name('detail_sanpham');
    Route::post('detail/{id}',[SanPhamController::class,'detailUpdate'])->name('detail_update');
    Route::post('update-product-att',[SanPhamController::class,'updateProductAtt'])->name('update_product_att');
    Route::get('update-product-price',[SanPhamController::class,'updateProductPrice']);
    Route::get('update-product-inventory',[SanPhamController::class,'updateProductInventory']);
    Route::post('update-product-status/{id}',[SanPhamController::class,'updateProductStatus'])->name('update-product-status');
});
Route::prefix('user')->name('user.')->group(function(){
    Route::get('/',[UserController::class,'index'])->name('index');
});
Route::prefix('khach-hang')->name('khach-hang.')->group(function(){
    Route::get('/',[CustomerController::class,'index'])->name('index');
    Route::get('delete/{id}',[CustomerController::class,'delete'])->name('delete_khachhang');
});
Route::prefix('order')->name('order.')->group(function(){
    Route::get('/',[OrderController::class,'index'])->name('index');
    Route::get('delete/{id}',[OrderController::class,'delete'])->name('delete_order');
    Route::get('edit/{id}',[OrderController::class,'edit'])->name('edit_order');
    Route::post('edit/{id}',[OrderController::class,'update'])->name('update_order');
    Route::get('detail/{id}',[OrderController::class,'detailOrder'])->name('detail_order');

});
Route::prefix('ship')->name('ship.')->group(function (){
    Route::get('/',[\App\Http\Controllers\ShippingFeeControlle::class,'index'])->name('index');
    Route::match(['get','post'],'add',[\App\Http\Controllers\ShippingFeeControlle::class,'add'])->name('add_ship');
    Route::get('edit/{id}',[\App\Http\Controllers\ShippingFeeControlle::class,'edit'])->name('edit_ship');
    Route::post('edit/{id}',[\App\Http\Controllers\ShippingFeeControlle::class,'update'])->name('update_ship');
    Route::get('delete/{id}',[\App\Http\Controllers\ShippingFeeControlle::class,'delete'])->name('delete_ship');
});
Route::get('check-coupon',[\App\Http\Controllers\CouponController::class,'checkCoupon'])->name('check_coupon');
Route::prefix('coupon')->name('coupon.')->group(function (){
    Route::get('/',[\App\Http\Controllers\CouponController::class,'index'])->name('index');
    Route::match(['get','post'],'add',[\App\Http\Controllers\CouponController::class,'add'])->name('add_coupon');
    Route::get('delete/{id}',[\App\Http\Controllers\CouponController::class,'delete'])->name('delete_coupon');
    Route::get('edit/{id}',[\App\Http\Controllers\CouponController::class,'edit'])->name('edit_coupon');
    Route::post('edit/{id}',[\App\Http\Controllers\CouponController::class,'update'])->name('update_coupon');
});
Route::prefix('attribute')->name('attribute.')->group(function (){
    Route::get('/',[\App\Http\Controllers\AttributeController::class,'index'])->name('index');
    Route::get('detail/{name}',[\App\Http\Controllers\AttributeController::class,'DetailAtt'])->name('detail_att');
    Route::get('edit/{id}',[\App\Http\Controllers\AttributeController::class,'edit'])->name('edit_attribute');
    Route::post('edit/{id}',[\App\Http\Controllers\AttributeController::class,'update'])->name('update_attribute');
    Route::match(['get','post'],'add',[\App\Http\Controllers\AttributeController::class,'add'])->name('add_att');
    Route::get('delete/{id}',[\App\Http\Controllers\AttributeController::class,'deleteAtt'])->name('delete_att');

});
Route::prefix('sku')->name('sku.')->group(function (){
    Route::get('/',[\App\Http\Controllers\AttributeController::class,'listSku'])->name('listSku');
    Route::match(['get','post'],'add-sku',[\App\Http\Controllers\AttributeController::class,'addSku'])->name('add_sku');

});
Route::get('send-mail',[\App\Http\Controllers\CouponController::class,'sendMail'])->name('sendMail');
