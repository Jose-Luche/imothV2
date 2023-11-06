<?php


use App\Http\Controllers\Front\Insurance\LastExpenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Front\AttachmentController;
use App\Http\Controllers\Front\Insurance\HomeController;
use App\Http\Controllers\Front\Insurance\LifeController;
use App\Http\Controllers\Front\Insurance\HealthController;
use App\Http\Controllers\Front\Insurance\TravelController;
use App\Http\Controllers\Front\Insurance\BidBondController;
use App\Http\Controllers\Front\Insurance\BusinessController;
use App\Http\Controllers\Front\Insurance\ThirdPartyController;
use App\Http\Controllers\Front\Insurance\ComprehensiveController;
use App\Http\Controllers\Front\Insurance\OtherPersonalAccidentController;

Route::prefix('pay')->group(function () {
    Route::get('/register', [PaymentController::class, 'mpesaRegisterUrls']);
    Route::get('/stkTest', [PaymentController::class, 'stkPushTest'])->name('payment.stk.test');
    Route::post('/stkPush', [PaymentController::class, 'customerMpesaSTKPush'])->name('payment.stk');
    Route::post('/check/', [PaymentController::class, 'checkPayment'])->name('payment.check');
    //    Route::get('/stk_test', [PaymentController::class,'customerMpesaSTKPush'])->name('payment.stk.test');
    Route::get('/success/{payment_id}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
});
Route::get('/', function () {
    $getHost = request()->getSchemeAndHttpHost();

    return view('front.index2');
})->name('home');
//Route::view('/contact-us', 'front.contact')->name('contact');
//Route::post('/contact', [ContactController::class, 'contact'])->name('contact.action');
Route::prefix('covers')->group(function () {
    Route::prefix('comprehensive')->group(function () {
        Route::get('/', [ComprehensiveController::class, 'index'])->name('front.comprehensive.index');
        Route::post('/vehicle', [ComprehensiveController::class, 'submitVehicleDetails'])->name('front.comprehensive.vehicle.submit');
        Route::get('/bio', [ComprehensiveController::class, 'userBio'])->name('front.comprehensive.bio');
        Route::post('/bio/submit', [ComprehensiveController::class, 'submitBio'])->name('front.comprehensive.bio.submit');
        Route::get('/covers/{id}', [ComprehensiveController::class, 'covers'])->name('front.comprehensive.covers');
        Route::get('/details/{applicationId}/{id}', [ComprehensiveController::class, 'coverDetails'])->name('front.comprehensive.details');
        Route::get('/submit/{applicationId}/{id}', [ComprehensiveController::class, 'submitApplication'])->name('front.comprehensive.details.submit');
        Route::post('/documents/{id}', [ComprehensiveController::class, 'uploadDocuments'])->name('front.comprehensive.upload');
        Route::get('/pay/{id}', [ComprehensiveController::class, 'pay'])->name('front.comprehensive.pay');
    });
    Route::prefix('third-party')->group(function () {
        Route::get('/', [ThirdPartyController::class, 'index'])->name('front.third.index');
        Route::post('/vehicle', [ThirdPartyController::class, 'submitVehicleDetails'])->name('front.third.vehicle.submit');
        Route::get('/bio', [ThirdPartyController::class, 'userBio'])->name('front.third.bio');
        Route::post('/bio/submit', [ThirdPartyController::class, 'submitBio'])->name('front.third.bio.submit');
        Route::get('/covers/{id}', [ThirdPartyController::class, 'covers'])->name('front.third.covers');
        Route::get('/details/{applicationId}/{id}', [ThirdPartyController::class, 'coverDetails'])->name('front.third.details');
        Route::get('/submit/{applicationId}/{id}', [ThirdPartyController::class, 'submitApplication'])->name('front.third.details.submit');
        Route::post('/documents/{id}', [ThirdPartyController::class, 'uploadDocuments'])->name('front.third.upload');
        Route::get('/pay/{id}', [ThirdPartyController::class, 'pay'])->name('front.third.pay');
    });
    Route::prefix('bid-bond')->group(function () {
        Route::get('/', [BidBondController::class, 'index'])->name('front.bond.index');
        Route::post('/bond', [BidBondController::class, 'submitBondDetails'])->name('front.bond.submit');
        Route::get('/bio', [BidBondController::class, 'userBio'])->name('front.bond.bio');
        Route::post('/bio/submit', [BidBondController::class, 'submitBio'])->name('front.bond.bio.submit');
        Route::get('/covers/{id}', [BidBondController::class, 'covers'])->name('front.bond.covers');
        Route::get('/details/{applicationId}/{id}', [BidBondController::class, 'coverDetails'])->name('front.bond.details');
        Route::get('/submit/{applicationId}/{id}', [BidBondController::class, 'submitApplication'])->name('front.bond.details.submit');
        Route::get('/pay/{id}', [BidBondController::class, 'pay'])->name('front.bond.pay');
    });

    Route::prefix('business')->group(function () {
        Route::get('/', [BusinessController::class, 'index'])->name('front.business.index');
        Route::post('/bio/submit', [BusinessController::class, 'submitBio'])->name('front.business.bio.submit');
    });

    Route::prefix('life')->group(function () {
        Route::get('/', [LifeController::class, 'index'])->name('front.life.index');
        Route::post('/bio/submit', [LifeController::class, 'submitBio'])->name('front.life.bio.submit');
    });

    /**Added By Katula**/
    Route::prefix('health')->group(function () {
        Route::get('/', [HealthController::class, 'index'])->name('front.health.index');
        Route::post('/bond', [HealthController::class, 'submitHealthDetails'])->name('front.health.submit');
        Route::get('/bio', [HealthController::class, 'userBio'])->name('front.health.bio');
        Route::post('/bio/submit', [HealthController::class, 'submitBio'])->name('front.health.bio.submit');
        Route::get('/covers/{id}', [HealthController::class, 'covers'])->name('front.health.covers');
        Route::get('/update-my-application/{id}/{limitId}/{inpatientBasicPremium}/{currentSelectedOutpatient}/{currentSelectedDental}/{currentSelectedOptical}/{currentSelectedMaternity}', [HealthController::class, 'updateSelectedCover']);
        Route::get('/update-outpatient-premium-details/{id}/{activator}/{limit}/{pp_pf}/{insurerId?}', [HealthController::class, 'updateOutpatientCover']);
        Route::get('/update-dental-premium-details/{id}/{activator}/{limit}/{insurerId?}', [HealthController::class, 'updateDentalCover']);
        Route::get('/update-optical-premium-details/{id}/{activator}/{limit}/{insurerId?}', [HealthController::class, 'updateOpticalCover']);
        Route::get('/update-maternity-premium-details/{id}/{activator}/{limit}/{insurerId?}', [HealthController::class, 'updateMaternityCover']);
        Route::get('/details/{applicationId}/{id}', [HealthController::class, 'coverDetails'])->name('front.health.details');
        Route::get('/submit/{applicationId}/{id}', [HealthController::class, 'submitApplication'])->name('front.health.details.submit');
        Route::get('/pay/{id}', [HealthController::class, 'pay'])->name('front.health.pay');
    });

    Route::prefix('travel')->group(function () {
        Route::get('/', [TravelController::class, 'index'])->name('front.travel.index');
        Route::post('/travel', [TravelController::class, 'submitTravelDetails'])->name('front.travel.submit');
        Route::get('/bio', [TravelController::class, 'userBio'])->name('front.travel.bio');
        Route::post('/bio/submit', [TravelController::class, 'submitBio'])->name('front.travel.bio.submit');
        Route::get('/covers/{id}', [TravelController::class, 'covers'])->name('front.travel.covers');
        Route::get('/details/{applicationId}/{id}', [TravelController::class, 'coverDetails'])->name('front.travel.details');
        Route::get('/submit/{applicationId}/{id}', [TravelController::class, 'submitApplication'])->name('front.travel.details.submit');
        Route::post('/documents/{id}', [TravelController::class, 'uploadDocuments'])->name('front.travel.upload');
        Route::get('/pay/{id}', [TravelController::class, 'pay'])->name('front.travel.pay');
    });

    Route::prefix('home')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('front.home.index');
        Route::post('/bio/submit', [HomeController::class, 'submitBio'])->name('front.home.bio.submit');

    });

    Route::prefix('industrial-attachment')->group(function () {
        Route::get('/', [AttachmentController::class, 'index'])->name('front.attachment.index');
        Route::post('/submit', [AttachmentController::class, 'submit'])->name('front.attachment.submit');
        Route::get('/quotes', [AttachmentController::class, 'quotes'])->name('front.attachment.quotes');
        Route::get('/details/{id}', [AttachmentController::class, 'quoteDetails'])->name('front.attachment.details');
        Route::get('/submit/{id}', [AttachmentController::class, 'submitApplication'])->name('front.attachment.details.submit');
        Route::get('/pay/{id}', [AttachmentController::class, 'pay'])->name('front.attachment.pay');
    });

    /**Added by Babu**/
    Route::prefix('personalAccident')->group(function () {
        Route::get('/', [OtherPersonalAccidentController::class, 'index'])->name('front.personalAccident.index');
        Route::post('/submit', [OtherPersonalAccidentController::class, 'submit'])->name('front.personalAccident.submit');
        Route::get('/quotes', [OtherPersonalAccidentController::class, 'quotes'])->name('front.personalAccident.quotes');
        Route::get('/details/{id}', [OtherPersonalAccidentController::class, 'quoteDetails'])->name('front.personalAccident.details');
        Route::get('/submit/{id}', [OtherPersonalAccidentController::class, 'submitApplication'])->name('front.personalAccident.details.submit');
        Route::get('/pay/{id}', [OtherPersonalAccidentController::class, 'pay'])->name('front.personalAccident.pay');
    });

    Route::prefix('lastExpense')->group(function () {
        Route::get('/', [LastExpenseController::class, 'index'])->name('front.lastExpense.index');
        Route::post('/lastExpense', [LastExpenseController::class, 'submit'])->name('front.lastExpense.submit');
        Route::get('/bio', [LastExpenseController::class, 'userBio'])->name('front.lastExpense.bio');
        Route::post('/bio/submit', [LastExpenseController::class, 'submitBio'])->name('front.lastExpense.bio.submit');
        Route::get('/covers/{id}', [LastExpenseController::class, 'covers'])->name('front.lastExpense.covers');
        Route::get('/details/{applicationId}/{id}', [LastExpenseController::class, 'coverDetails'])->name('front.lastExpense.details');
        Route::get('/submit/{applicationId}/{id}', [LastExpenseController::class, 'submitApplication'])->name('front.lastExpense.details.submit');
        Route::post('/documents/{id}', [LastExpenseController::class, 'uploadDocuments'])->name('front.lastExpense.upload');
        Route::get('/pay/{id}', [LastExpenseController::class, 'pay'])->name('front.lastExpense.pay');
    });
});
