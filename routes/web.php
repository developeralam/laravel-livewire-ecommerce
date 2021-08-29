<?php

use App\Http\Livewire\Backend\Seo;
use App\Http\Livewire\Backend\Admin;
use App\Http\Livewire\Frontend\Cart;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Backend\Coupon;
use App\Http\Livewire\Backend\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Backend\Product;
use App\Http\Livewire\Backend\Service;
use App\Http\Livewire\Backend\Category;
use App\Http\Livewire\Frontend\Contact;
use App\Http\Livewire\Frontend\Checkout;
use App\Http\Livewire\Backend\Siteconfig;
use App\Http\Livewire\Frontend\DeliveryInfo;
use App\Http\Livewire\Frontend\ReturnPolicy;
use App\Http\Livewire\Frontend\PaymentPolicy;
use App\Http\Livewire\Frontend\PrivacyPolicy;
use App\Http\Livewire\Frontend\ProductDetails;
use App\Http\Livewire\Frontend\TermsCondition;
use App\Http\Livewire\Frontend\CategoryDetails;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/product/{slug}', ProductDetails::class)->name('product.details');
Route::get('/category/{slug}', CategoryDetails::class)->name('category.details');
//Cart
Route::get('/cart', Cart::class)->name('cart');
Route::get('/checkout', Checkout::class)->name('checkout');

Route::get('/contact', Contact::class)->name('contact');
Route::get('/payment-policy', PaymentPolicy::class)->name('payment.policy');
Route::get('/return-policy', ReturnPolicy::class)->name('return.policy');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy.policy');
Route::get('/terms-condition', TermsCondition::class)->name('terms.condition');
Route::get('/delivery-info', DeliveryInfo::class)->name('delivery.info');

//User Routes
Route::group(['prefix' => '/user', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return 'user dashboard';
    })->name('user.dashboard');
});
//Admin Routes
Route::group(['prefix' => '/admin', 'middleware' => ['auth:sanctum', 'verified', 'admin']], function () {
    Route::get('/', Admin::class)->name('admin.dashboard');
    Route::get('/category', Category::class)->name('admin.category');
    Route::get('/product', Product::class)->name('admin.product');
    Route::get('/seo', Seo::class)->name('admin.seo');
    Route::get('/siteconfig', Siteconfig::class)->name('admin.siteconfig');
    Route::get('/slider', Slider::class)->name('admin.slider');
    Route::get('/service', Service::class)->name('admin.service');
    Route::get('/coupon', Coupon::class)->name('admin.coupon');
});
