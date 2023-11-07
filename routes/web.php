<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PdfOutputController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
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

//Route::get('lang/home', [LangController::class, 'index'])->name('login');
//Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('login', [AdminLoginController::class, 'login'])->name('login'); // 情報入力画面  複数の場合->where(['type'=> '[a-z0-9]*','type2'=> '[a-z0-9]*'])
Route::post('login', [AdminLoginController::class, 'auth']);
Route::any('logout', [AdminLoginController::class, 'logout']);



Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
        Route::get('/orders/search', [OrderController::class, 'search'])->name('order.search');
        Route::post('/orders', [OrderController::class, 'action']);
        Route::get('/orders/bundle_updates', [OrderController::class, 'bundle_updates'])->name('order.bundle_updates');
        Route::get('/orders/create', [OrderController::class, 'create']);
        Route::get('/orders/{id}', [OrderController::class, 'show']);
        Route::post('/orders/{id}', [OrderController::class, 'update']);

        Route::get('/products', [ProductController::class, 'index'])->name('product.index');
        Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
        Route::post('/products', [ProductController::class, 'action']);
        Route::get('/products/bundle_updates', [ProductController::class, 'bundle_updates'])->name('product.bundle_updates');;
        Route::get('/products/{id}', [ProductController::class, 'show']);
        Route::post('/products/{id}', [ProductController::class, 'update']);
        Route::get('/products_new', [ProductController::class, 'create']);
        Route::post('/products_new', [ProductController::class, 'store']);

        Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
        Route::get('/contacts/search', [ContactController::class, 'search'])->name('contact.search');
        Route::post('/contacts', [ContactController::class, 'action']);
        Route::get('/contacts/bundle_updates', [ContactController::class, 'bundle_updates'])->name('contact.bundle_updates');;
        Route::get('/contacts/{id}', [ContactController::class, 'show']);
        Route::post('/contacts/{id}', [ContactController::class, 'update']);

        Route::get('/requests', [RequestController::class, 'index'])->name('request.index');
        Route::get('/requests/search', [RequestController::class, 'search'])->name('request.search');
        Route::post('/requests', [RequestController::class, 'action']);
        Route::get('/requests/bundle_updates', [RequestController::class, 'bundle_updates'])->name('request.bundle_updates');
        Route::get('/requests/{id}', [RequestController::class, 'show']);
        Route::post('/requests/{id}', [RequestController::class, 'update']);

        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/{id}', [UserController::class, 'show']);
//        Route::post('/users/{id}', [UserController::class, 'update']);

        Route::get('setting', [AdminLoginController::class, 'setting']);
        Route::post('setting', [AdminLoginController::class, 'update_setting']);

        /* PDF出力 */
        Route::get('/pdfoutput/order/{order_id}', [PdfOutputController::class, 'order']);
        Route::get('/pdfoutput/multi_orders', [PdfOutputController::class, 'multi_orders'])->name('order.multi_pdf');


        Route::get('/pdfoutput/contact/{contact_id}', [PdfOutputController::class, 'contact']);
        Route::get('/pdfoutput/requests/{contact_id}', [PdfOutputController::class, 'requests']);

    });
});

//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/order', [OrderController::class, 'index']);
//});

// Route::get('product', [AdminProductController::class, 'auth'])->middleware('auth');
// Route::get('product/detail', function () {
// 	return view('product/detail');
// });
// Route::get('member', function () {
// 	return view('member/list');
// });







///toku
// ---------------------------------------------

/* PDF出力 */
Route::get('/pdfoutput/order/{order_id}', [PdfOutputController::class, 'order']);

Route::get('/pdfoutput/contact/{contact_id}', [PdfOutputController::class, 'contact']);
Route::get('/pdfoutput/requests/{contact_id}', [PdfOutputController::class, 'requests']);




/* CSV出力 */
Route::get('/csvoutput/order',  function () {return view('pdfoutput/order');});

// ---------------------------------------------
//Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified'
//])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
//});
