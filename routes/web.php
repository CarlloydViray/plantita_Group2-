<?php

use App\Http\Controllers\CustomerMyAccount;
use App\Http\Controllers\CustomerOrders;
use App\Http\Controllers\Marketplace;
use App\Http\Controllers\Payment;
use App\Http\Controllers\SellerMyAccount;
use App\Http\Controllers\SellerPlantita;
use App\Http\Controllers\SignUp;
use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('loginPage');
});

Route::post('login', [UserAuth::class, 'login']);
Route::view('debug', 'debug');
Route::view('customerPage', 'customer.customerPage');
Route::view('sellerPage', 'seller.sellerPage');

Route::get('/logout', function () {
    if (session()->has('regno')) {
        session()->pull('regno');
    }
    return redirect('/')->with('success', 'Log out successful');
});

Route::get('/', function () {
    if (session()->has('regno')) {
        return redirect('customerPage');
    }
    return view('loginPage');
});

Route::get('/signup', function () {

    return view('signupPage');
});

Route::get('/login', function () {

    return view('loginPage');
});


Route::post('signup', [SignUp::class, 'createAcc']);

//edit accounts

//customer
route::resource('MyAccountCustomer', CustomerMyAccount::class);
Route::post('customerMyAcc', [UserAuth::class, 'customerMyAccRoute']);

Route::get('edit/customer/{id}', [CustomerMyAccount::class, 'edit']);
Route::post('edit/customer/{id}', [CustomerMyAccount::class, 'update']);

//seller
route::resource('MyAccountSeller', SellerMyAccount::class);
Route::post('sellerMyAcc', [UserAuth::class, 'sellerMyAccRoute']);

Route::get('edit/seller/{id}', [SellerMyAccount::class, 'edit']);
Route::post('edit/seller/{id}', [SellerMyAccount::class, 'update']);

//

//customer


//seller plantita
route::resource('sellerMyPlantita', SellerPlantita::class);
Route::post('sellerPlantita', [UserAuth::class, 'sellerPlantitaRoute']);

Route::get('edit/{id}', [SellerPlantita::class, 'edit']);
Route::post('edit/{id}', [SellerPlantita::class, 'update']);
Route::get('delete/{id}', [SellerPlantita::class, 'destroy']);


//customer Marketplace
route::resource('customerMarketplace', Marketplace::class);
Route::post('customerMarketplaceDirect', [UserAuth::class, 'customerMarketplaceRoute']);

//customer payment
route::resource('customerPaymentPreview', Marketplace::class);
Route::post('customerPaymentDirect', [Payment::class, 'customerPaymentDirect']);
Route::post('customerPaymentPage', [Payment::class, 'customerPaymentDirect']);

//Route::post('/other-page', [OtherController::class, 'index'])->name('other-page');

//customer orders
route::resource('customerOrders', CustomerOrders::class);
Route::post('customerMyOrdersDirect', [UserAuth::class, 'customerMyOrdersRoute']);
Route::get('delete/{id}', [CustomerOrders::class, 'destroy']);
