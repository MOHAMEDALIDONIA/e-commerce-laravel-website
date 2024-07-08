<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Auth::routes();
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function(){
  Route::get('/','index');
  Route::get('/collections','categories');
  Route::get('/collections/{category_slug}','products');
  Route::get('/collections/{category_slug}/{product_slug}','productView');
  Route::get('/thank-you','thankyou');
  Route::get('/new-arrivals','NewArrival');
  Route::get('/featured-products','FeaturedProducts');
  Route::get('search','searchProduct');

});


Route::middleware(['auth'])->group(function(){
  Route::get('/wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index']);
  Route::get('/cart',[App\Http\Controllers\Frontend\CartController::class,'index']);
  Route::get('/checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'index']);
  Route::get('/orders',[App\Http\Controllers\Frontend\OrderController::class,'index']);
  Route::get('/orders/{OrderId}',[App\Http\Controllers\Frontend\OrderController::class,'Show']);
  Route::get('profile',[App\Http\Controllers\Frontend\UserController::class,'index']);
  Route::post('profile',[App\Http\Controllers\Frontend\UserController::class,'updateUserDetails']);
  Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class,'passwordCreate']);
  Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class,'changePassword']);
});



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test',function(){
  $trandingProducts = Product::where('tranding','1')->latest()->take(15)->get();
    return view('test' ,compact('trandingProducts'));
});
//paypal

Route::prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment',[App\Http\Controllers\PaymentController::class, 'handlePayment'])->name('make.payment');
        Route::get('cancel-payment',[App\Http\Controllers\PaymentController::class,'paymentCancel'])->name('cancel.payment');
        Route::get('payment-success',[App\Http\Controllers\PaymentController::class, 'paymentSuccess'])->name('success.payment');
    });
//Another try
//    Route::get('payment-cancel',[App\Http\Controllers\Frontend\PaypalController::class,'cancel'])->name('payment.cancel');
//    Route::get('payment-success',[App\Http\Controllers\Frontend\PaypalController::class,'success'])->name('payment.success');

############################- end paypal -#########################################
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store']);
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
      Route::get('sliders','index');
      Route::get('sliders/create','create');
      Route::post('sliders/store','store');
      Route::get('sliders/{slider}/edit','edit');
      Route::put('sliders/{slider}','update');
      Route::get('sliders/{slider}/delete','destory');

    });
    //category routes
   Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
    Route::get('/category','index');
    Route::get('/category/create','create')->name('create.category');
    Route::post('/category/store','store')->name('store.category');
    Route::get('/category/{category}/edit','edit');
    Route::post('/category/{category}','update');
    

   });
   Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
    Route::get('/products','index');
    Route::get('/products/create','create')->name('create.product');
    Route::post('/products','store')->name('store.product');
    Route::get('/products/{product}/edit','edit');
    Route::put('/products/{product}','update');
    Route::get('/products/{product}/delete','destory');
    Route::get('/product-image/{product_image_id}/delete','destoryImage');
    Route::post('/product-color/{prod_color_id}','updateProdColorQty');
    Route::get('/product-color/{prod_color_id}/delete','deleteProdColor');

   });
   Route::get('/brands',App\Http\Livewire\Admin\Brands\Index::class);
   Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function(){
    Route::get('/colors','index');
    Route::get('/colors/create','create')->name('create.colors');
    Route::post('/colors/store','store')->name('store.colors');
    Route::get('/colors/{color}/edit','edit');
    Route::put('/colors/{color}','update');
    Route::get('/colors/{color}/delete','destory');




  });
  Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
    Route::get('/orders','index');
    Route::get('/orders/{orderid}','Show');
    Route::put('/orders/{orderid}','updateOrderStatus');
    Route::get('/invoice/{orderid}/generate','generateinvoice');
    Route::get('/invoice/{orderid}/mail','mailInvoice');
    Route::get('/invoice/{orderid}','viewinvoice');




  });
  Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function(){
    Route::get('/users','index');
    Route::get('/users/create','create');
    Route::post('/users/store','store');
    Route::get('/users/{user_id}/edit','edit');
    Route::put('/users/{user_id}','update');
    Route::get('/users/{user_id}/delete','destory');


  });


  
});
