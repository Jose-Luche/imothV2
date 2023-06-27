<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Payment\PaymentController;
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
Route::view('/home-insurance', 'front.pages.products.home_ins')->name('home.ins');
Route::view('/travel-insurance', 'front.pages.products.travel')->name('travel');
Route::view('/business-insurance', 'front.pages.products.business_ins')->name('business');
Route::view('/bond-insurance', 'front.pages.products.bid_bond')->name('bid_bond');
Route::view('/life-insurance', 'front.pages.products.life')->name('life');
Route::view('/student-attachment-insurance', 'front.pages.products.attachment')->name('attachment');
Route::view('/contact', 'front.pages.contact')->name('contact');
Route::view('/products', 'front.pages.products.products')->name('products');
Route::view('/faq-insurance', 'front.pages.faq')->name('faq');
Route::view('/location', 'front.pages.location')->name('ourLocation');

Route::get('/mpesa-confirmation', [PaymentController::class, 'generateAccessToken']);
