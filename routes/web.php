<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Payment\PaystackController;

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

Route::get('/pdf-test', [\App\Http\Controllers\PdfTestController::class, 'pdf']);
Route::view('/', 'front.index2')->name('home');
//Route::view('/contact-us', 'front.contact')->name('contact');
//Route::post('/contact', [ContactController::class, 'contact'])->name('contact.action');

//Route::view('/test','front.index2')->name('home');
Route::view('/about-imoth-insurance', 'front.pages.about')->name('about');
Route::view('/motor-insurance', 'front.pages.products.motor')->name('motor');
Route::view('/medical-insurance', 'front.pages.products.medical')->name('medical');
Route::view('/seniors-medical-insurance', 'front.pages.products.seniors')->name('seniors');
Route::view('/home-insurance', 'front.pages.products.home_ins')->name('home.ins');
Route::view('/travel-insurance', 'front.pages.products.travel')->name('travel');
Route::view('/business-insurance', 'front.pages.products.business_ins')->name('business');
Route::view('/bond-insurance', 'front.pages.products.bid_bond')->name('bid_bond');
Route::view('/funeral-expense-insurance', 'front.pages.products.last_expense')->name('last_expense');
Route::view('/life-insurance', 'front.pages.products.life')->name('life');
Route::view('/student-attachment-insurance', 'front.pages.products.attachment')->name('attachment');
Route::view('/personal-accident', 'front.pages.products.personal-accident')->name('pa'); //Other Personal Accidents
//Route::view('/contact', 'front.pages.contact')->name('contact');
Route::view('/products', 'front.pages.products.products')->name('products');
Route::view('/faq-insurance', 'front.pages.faq')->name('faq');
Route::view('/policy-privacy', 'front.pages.policy-privacy')->name('policyPrivacy');
Route::view('/location', 'front.pages.location')->name('ourLocation');

Route::get('/mpesa-confirmation', [PaymentController::class, 'generateAccessToken']);

Route::get('/callback', [PaystackController::class, 'callback'])->name('callback');
Route::get('/success', [PaystackController::class, 'success'])->name('success');
Route::get('/cancel', [PaystackController::class, 'cancel'])->name('cancel');

Route::get('/welcome', function () {
    return view ('welcome');
});

Route::resource('contact', ContactController::class);

