<?php

use App\Http\Controllers\QuotationController;

Route::view('/attachment','front.pages.quotations.attachment')->name('attachment_quote');
Route::view('/bid-bond','front.pages.quotations.bid_bond')->name('bid_bond_quote');
Route::view('/business','front.pages.quotations.business')->name('business_quote');
Route::view('/home','front.pages.quotations.home')->name('home_quote');
Route::view('/life','front.pages.quotations.life')->name('life_quote');
//Route::view('/motor','front.pages.quotations.motor')->name('motor_quote');
Route::view('/travel','front.pages.quotations.travel')->name('travel_quote');

Route::get('/quotation/{applicationId}/{id}/{type?}',[QuotationController::class, 'quotationPdf'])->name('front.pages.quotations.quotation-pdf');