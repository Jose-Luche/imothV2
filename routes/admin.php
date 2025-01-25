<?php

use App\Http\Controllers\Admin\LastExpenseController;
use App\Http\Controllers\Admin\SeniorsMedicalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LifeController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\HealthController;
use App\Http\Controllers\Admin\TravelController;
use App\Http\Controllers\Admin\ClausesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Admin\BidBondsController;
USE App\Http\Controllers\Admin\PerformanceBondsController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\PaymentsController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ThirdPartyController;
use App\Http\Controllers\Admin\ComprehensiveController;
use App\Http\Controllers\Admin\PersonalAccidentController;
use App\Http\Controllers\Admin\InsuranceCompaniesController;
use App\Http\Controllers\Admin\IndustrialAttachmentController;



Route::get('logout', [AuthController::class,'logOut'])->name('logout');
Route::prefix('quotation')->name('')->group(base_path('routes/web/quotation.php'));
Route::prefix('admin')->group(function() {
    Route::prefix('auth')->group(function() {
        Route::get('/login', [AuthController::class,'login'])->name('admin.login');
        Route::post('/loginAction', [AuthController::class,'doLogin'])->name('admin.login.action');
        Route::prefix('password')->group(function() {
            Route::get('/reset', [AuthController::class,'resetPassword'])->name('admin.password.reset');
            Route::post('/reset', [AuthController::class,'resetAction'])->name('admin.password.reset.action');
            Route::get('/new/{token}', [AuthController::class,'newPassword'])->name('admin.password.new');
            Route::post('/newPassword', [AuthController::class,'submitPassword'])->name('admin.password.new.submit');
            Route::get('/activate/{token}', [AuthController::class,'activate'])->name('admin.users.new.activate');
            Route::post('/activate/account', [AuthController::class,'activateAccount'])->name('admin.users.activate.action');
        });
    });
    Route::middleware(['admin'])->group(function() {
        Route::get('/', [DashboardController::class,'dashboard'])->name('admin.dashboard');

        Route::get('/contactsUs', [ContactController::class, 'viewEnquiries'])->name('view.enquiries');
        Route::get('/enquiry/details', [ContactController::class, 'details'])->name('enquiries.details');

        Route::prefix('profile')->group(function() {
            Route::get('/', [ProfileController::class,'profile'])->name('admin.profile');
            Route::post('/update', [ProfileController::class,'update'])->name('admin.profile.update');
            Route::post('/avatar', [ProfileController::class,'updateAvatar'])->name('admin.profile.avatar');
            Route::post('/password', [ProfileController::class,'updatePassword'])->name('admin.profile.password');
        });
        Route::prefix('notifications')->group(function() {
            Route::get('/contactUs', 'Admin\NotificationsController@contact')->name('admin.notifications.contact');

            Route::prefix('contacts')->group(function() {
                Route::get('/', 'Admin\NotificationsController@contactList')->name('admin.notifications.contact.list');
                Route::post('/add', 'Admin\NotificationsController@submitContact')->name('admin.notifications.contact.submit');
                Route::get('/{id}/delete', 'Admin\NotificationsController@deleteContact')->name('admin.notifications.contact.delete');
                Route::get('/excel', 'Admin\ExcelUploadController@importExport')->name('admin.notifications.contact.excel');
                Route::post('/excel/upload', 'Admin\ExcelUploadController@importExcel')->name('admin.notifications.contact.excel.upload');
            });

        });
        Route::prefix('users')->group(function() {
            Route::get('/', [UsersController::class,'users'])->name('admin.users');
            Route::get('/{id}/details', [UsersController::class,'details'])->name('admin.users.details');
            Route::get('/new', [UsersController::class,'newUser'])->name('admin.users.create');
            Route::post('/create', [UsersController::class,'store'])->name('admin.users.submit');
            Route::get('/{id}/delete', [UsersController::class,'delete'])->name('admin.users.delete');
            Route::get('/{id}/suspend', [UsersController::class,'suspend'])->name('admin.users.suspend');
            Route::get('/{id}/activate', [UsersController::class,'activateUser'])->name('admin.users.activate');
            Route::post('/update/{id}', [UsersController::class,'update'])->name('admin.users.update');
        });
        Route::prefix('enquiries')->group(function() {
            Route::get('/', 'Admin\EnquiriesController@enquiries')->name('admin.enquiries');
            Route::post('/details', 'Admin\EnquiriesController@details')->name('admin.enquiries.details');
            Route::post('/enquiries', 'Admin\EnquiriesController@enquiriesCount')->name('admin.enquiries.count');
            Route::get('/{bookingId}/read', 'Admin\EnquiriesController@read')->name('admin.enquiries.read');
        });
        Route::prefix('companies')->group(function() {
            Route::get('/', [InsuranceCompaniesController::class,'companies'])->name('admin.companies');
            Route::get('/new', [InsuranceCompaniesController::class,'create'])->name('admin.companies.create');
            Route::post('/submit', [InsuranceCompaniesController::class,'submit'])->name('admin.companies.submit');
            Route::get('/{id}/edit', [InsuranceCompaniesController::class,'edit'])->name('admin.companies.edit');
            Route::post('/update/{id}', [InsuranceCompaniesController::class,'update'])->name('admin.companies.update');
            Route::get('/delete/{id}', [InsuranceCompaniesController::class,'delete'])->name('admin.companies.delete');
        });
        Route::prefix('payments')->group(function() {
            Route::get('/', [PaymentsController::class,'payments'])->name('admin.payments');
        });
        Route::prefix('comprehensive')->group(function() {
            Route::get('/', [ComprehensiveController::class,'index'])->name('admin.comprehensive');
            Route::get('/new', [ComprehensiveController::class,'create'])->name('admin.comprehensive.create');
            Route::post('/submit', [ComprehensiveController::class,'submit'])->name('admin.comprehensive.submit');
            Route::get('/{id}/edit', [ComprehensiveController::class,'edit'])->name('admin.comprehensive.edit');
            Route::get('/{id}/details', [ComprehensiveController::class,'details'])->name('admin.comprehensive.details');
            Route::post('/update/{id}', [ComprehensiveController::class,'update'])->name('admin.comprehensive.update');
            Route::get('/delete/{id}', [ComprehensiveController::class,'delete'])->name('admin.comprehensive.delete');
            Route::get('/benefit/delete/{id}', [ComprehensiveController::class,'deleteBenefit'])->name('admin.comprehensive.benefit.delete');
        });
        Route::prefix('thirdParty')->group(function() {
            Route::get('/', [ThirdPartyController::class,'index'])->name('admin.thirdParty');
            Route::get('/new', [ThirdPartyController::class,'create'])->name('admin.thirdParty.create');
            Route::post('/submit', [ThirdPartyController::class,'submit'])->name('admin.thirdParty.submit');
            Route::get('/{id}/edit', [ThirdPartyController::class,'edit'])->name('admin.thirdParty.edit');
            Route::get('/{id}/details', [ThirdPartyController::class,'details'])->name('admin.thirdParty.details');
            Route::post('/update/{id}', [ThirdPartyController::class,'update'])->name('admin.thirdParty.update');
            Route::get('/delete/{id}', [ThirdPartyController::class,'delete'])->name('admin.thirdParty.delete');
            Route::get('/benefit/delete/{id}', [ThirdPartyController::class,'deleteBenefit'])->name('admin.thirdParty.benefit.delete');
        });
        /**Clauses/Limits Section**/
        Route::prefix('limits')->group(function() {
            Route::prefix('motor')->group(function() {
                Route::get('/', [ClausesController::class,'motorLimits'])->name('admin.limits.motor.list');
                Route::get('/details/{id}', [ClausesController::class,'viewMotorLimits'])->name('admin.limits.motor.details');
                Route::get('/edit/{id}', [ClausesController::class,'editMotorLimits'])->name('admin.limits.motor.edit');
                Route::post('/edit/{id}', [ClausesController::class,'storeEditMotorLimits'])->name('admin.limits.motor.store');
                Route::get('/create', [ClausesController::class,'createMotorLimits'])->name('admin.limits.motor.create');
                Route::post('/create', [ClausesController::class,'submitMotorLimits'])->name('admin.limits.motor.submit');
                Route::get('/delete/{id}', [ClausesController::class,'deleteMotorLimits'])->name('admin.limits.motor.delete');
            });
            Route::prefix('nonmotor')->group(function() {
                Route::get('/', [ClausesController::class,'nonMotorLimits'])->name('admin.limits.nonmotor.list');
                Route::get('/details/{id}', [ClausesController::class,'viewNonMotorLimits'])->name('admin.limits.nonmotor.details');
                Route::get('/edit/{id}', [ClausesController::class,'editNonMotorLimits'])->name('admin.limits.nonmotor.edit');
                Route::post('/edit/{id}', [ClausesController::class,'storeEditNonMotorLimits'])->name('admin.limits.nonmotor.store');
                Route::get('/create', [ClausesController::class,'createNonMotorLimits'])->name('admin.limits.nonmotor.create');
                Route::post('/create', [ClausesController::class,'submitNonMotorLimits'])->name('admin.limits.nonmotor.submit');
                Route::get('/delete/{id}', [ClausesController::class,'deleteNonMotorLimits'])->name('admin.limits.nonmotor.delete');
            });
        });

        Route::prefix('attachment')->group(function() {
            Route::get('/', [IndustrialAttachmentController::class,'index'])->name('admin.attachment');
            Route::get('/new', [IndustrialAttachmentController::class,'create'])->name('admin.attachment.create');
            Route::post('/submit', [IndustrialAttachmentController::class,'submit'])->name('admin.attachment.submit');
            Route::get('/{id}/edit', [IndustrialAttachmentController::class,'edit'])->name('admin.attachment.edit');
            Route::get('/{id}/details', [IndustrialAttachmentController::class,'details'])->name('admin.attachment.details');
            Route::post('/update/{id}', [IndustrialAttachmentController::class,'update'])->name('admin.attachment.update');
            Route::get('/delete/{id}', [IndustrialAttachmentController::class,'delete'])->name('admin.attachment.delete');
            Route::get('/benefit/delete/{id}', [IndustrialAttachmentController::class,'deleteBenefit'])->name('admin.attachment.benefit.delete');
        });

        Route::prefix('personalAccident')->group(function() {
            Route::get('/', [PersonalAccidentController::class,'index'])->name('admin.personalAccident');
            Route::get('/new', [PersonalAccidentController::class,'create'])->name('admin.personalAccident.create');
            Route::post('/submit', [PersonalAccidentController::class,'submit'])->name('admin.personalAccident.submit');
            Route::get('/{id}/edit', [PersonalAccidentController::class,'edit'])->name('admin.personalAccident.edit');
            Route::get('/{id}/details', [PersonalAccidentController::class,'details'])->name('admin.personalAccident.details');
            Route::post('/update/{id}', [PersonalAccidentController::class,'update'])->name('admin.personalAccident.update');
            Route::get('/delete/{id}', [PersonalAccidentController::class,'delete'])->name('admin.personalAccident.delete');
        });
        Route::prefix('bidBonds')->group(function() {
            Route::get('/', [BidBondsController::class,'index'])->name('admin.bidBonds');
            Route::get('/new', [BidBondsController::class,'create'])->name('admin.bidBonds.create');
            Route::post('/submit', [BidBondsController::class,'submit'])->name('admin.bidBonds.submit');
            Route::get('/{id}/edit', [BidBondsController::class,'edit'])->name('admin.bidBonds.edit');
            Route::get('/details/{id}', [BidBondsController::class,'details'])->name('admin.bidBonds.details');
            Route::post('/update/{id}', [BidBondsController::class,'update'])->name('admin.bidBonds.update');
            Route::get('/delete/{id}', [BidBondsController::class,'delete'])->name('admin.bidBonds.delete');
        });
        Route::prefix('performanceBonds')->group(function() {
            Route::get('/', [PerformanceBondsController::class,'index'])->name('admin.performanceBonds');
            Route::get('/new', [PerformanceBondsController::class,'create'])->name('admin.performanceBonds.create');
            Route::post('/submit', [PerformanceBondsController::class,'submit'])->name('admin.performanceBonds.submit');
            Route::get('/{id}/edit', [PerformanceBondsController::class,'edit'])->name('admin.performanceBonds.edit');
            Route::get('/details/{id}', [PerformanceBondsController::class,'details'])->name('admin.performanceBonds.details');
            Route::post('/update/{id}', [PerformanceBondsController::class,'update'])->name('admin.performanceBonds.update');
            Route::get('/delete/{id}', [PerformanceBondsController::class,'delete'])->name('admin.performanceBonds.delete');
        });

        Route::prefix('life')->group(function() {
            Route::get('/', [LifeController::class,'index'])->name('admin.life');
            Route::get('/new', [LifeController::class,'create'])->name('admin.life.create');
            Route::post('/submit', [LifeController::class,'submit'])->name('admin.life.submit');
            Route::get('/{id}/edit', [LifeController::class,'edit'])->name('admin.life.edit');
            Route::get('/details/{id}', [LifeController::class,'details'])->name('admin.life.details');
            Route::post('/update/{id}', [LifeController::class,'update'])->name('admin.life.update');
            Route::get('/delete/{id}', [LifeController::class,'delete'])->name('admin.life.delete');
        });

        Route::prefix('health')->group(function() {
            Route::get('/', [HealthController::class,'index'])->name('admin.health');
            Route::get('/new', [HealthController::class,'create'])->name('admin.health.create');
            Route::post('/submit', [HealthController::class,'submit'])->name('admin.health.submit');
            Route::get('/{id}/edit', [HealthController::class,'edit'])->name('admin.health.edit');
            Route::get('/details/{id}', [HealthController::class,'details'])->name('admin.health.details');
            Route::post('/update/{id}', [HealthController::class,'update'])->name('admin.health.update');
            Route::get('/delete/{id}', [HealthController::class,'delete'])->name('admin.health.delete');
            /**Save IP Premium Routes**/
            Route::get('/new-premium', [HealthController::class,'createIpPremium'])->name('admin.health.create_ip_premiums');
            Route::post('/submit-premium', [HealthController::class,'submitIpPremium'])->name('admin.health.submit_ip_premiums');
            Route::get('/limits/{id}/{benefit}/{pp_pf}', [HealthController::class,'viewLimits'])->name('admin.health.health-inpatient-limits');
            Route::get('/premiums/{id}', [HealthController::class,'viewPremiums'])->name('admin.health.available_premium_rates');

            /**OP Limits Routes**/
            Route::get('/new/op', [HealthController::class,'createOp'])->name('admin.health.create-op');
            Route::post('/submit/op', [HealthController::class,'submitOp'])->name('admin.health.submit-op');
        });

        Route::prefix('seniors')->group(function() {
            Route::get('/', [SeniorsMedicalController::class,'index'])->name('admin.seniors');
            Route::get('/new', [SeniorsMedicalController::class,'create'])->name('admin.seniors.create');
            Route::post('/submit', [SeniorsMedicalController::class,'submit'])->name('admin.seniors.submit');
            Route::get('/{id}/edit', [SeniorsMedicalController::class,'edit'])->name('admin.seniors.edit');
            Route::get('/details/{id}', [SeniorsMedicalController::class,'details'])->name('admin.seniors.details');
            Route::post('/update/{id}', [SeniorsMedicalController::class,'update'])->name('admin.seniors.update');
            Route::get('/delete/{id}', [SeniorsMedicalController::class,'delete'])->name('admin.seniors.delete');
            /**Save IP Premium Routes**/
            Route::get('/new-premium', [SeniorsMedicalController::class,'createIpPremium'])->name('admin.seniors.create_ip_premiums');
            Route::post('/submit-premium', [SeniorsMedicalController::class,'submitIpPremium'])->name('admin.seniors.submit_ip_premiums');
            Route::get('/limits/{id}/{benefit}/{pp_pf}', [SeniorsMedicalController::class,'viewLimits'])->name('admin.seniors.health-inpatient-limits');
            Route::get('/premiums/{id}', [SeniorsMedicalController::class,'viewPremiums'])->name('admin.seniors.available_premium_rates');

            /**OP Limits Routes**/
            Route::get('/new/op', [SeniorsMedicalController::class,'createOp'])->name('admin.seniors.create-op');
            Route::post('/submit/op', [SeniorsMedicalController::class,'submitOp'])->name('admin.seniors.submit-op');
        });
        /**Added By Babu O. Katula**/
        Route::prefix('travel')->group(function() {
            Route::get('/', [TravelController::class,'index'])->name('admin.travel');
            Route::get('/new', [TravelController::class,'create'])->name('admin.travel.create');
            Route::post('/submit', [TravelController::class,'submit'])->name('admin.travel.submit');
            Route::get('/{id}/edit', [TravelController::class,'edit'])->name('admin.travel.edit');
            Route::get('/details/{id}', [TravelController::class,'details'])->name('admin.travel.details');
            Route::post('/update/{id}', [TravelController::class,'update'])->name('admin.travel.update');
            Route::get('/delete/{id}', [TravelController::class,'delete'])->name('admin.travel.delete');
        });

        Route::prefix('home')->group(function() {
            Route::get('/', [HomeController::class,'index'])->name('admin.home');
            Route::get('/new', [HomeController::class,'create'])->name('admin.home.create');
            Route::post('/submit', [HomeController::class,'submit'])->name('admin.home.submit');
            Route::get('/{id}/edit', [HomeController::class,'edit'])->name('admin.home.edit');
            Route::get('/details/{id}', [HomeController::class,'details'])->name('admin.home.details');
            Route::post('/update/{id}', [HomeController::class,'update'])->name('admin.home.update');
            Route::get('/delete/{id}', [HomeController::class,'delete'])->name('admin.home.delete');
        });

        Route::prefix('business')->group(function() {
            Route::get('/', [BusinessController::class,'index'])->name('admin.business');
            Route::get('/new', [BusinessController::class,'create'])->name('admin.business.create');
            Route::post('/submit', [BusinessController::class,'submit'])->name('admin.business.submit');
            Route::get('/{id}/edit', [BusinessController::class,'edit'])->name('admin.business.edit');
            Route::get('/details/{id}', [BusinessController::class,'details'])->name('admin.business.details');
            Route::post('/update/{id}', [BusinessController::class,'update'])->name('admin.business.update');
            Route::get('/delete/{id}', [BusinessController::class,'delete'])->name('admin.business.delete');
        });

        Route::prefix('lastExpense')->group(function() {
            Route::get('/', [LastExpenseController::class,'index'])->name('admin.lastExpense');
            Route::get('/new', [LastExpenseController::class,'create'])->name('admin.lastExpense.create');
            Route::post('/submit', [LastExpenseController::class,'submit'])->name('admin.lastExpense.submit');
            Route::get('/{id}/edit', [LastExpenseController::class,'edit'])->name('admin.lastExpense.edit');
            Route::get('/details/{id}', [LastExpenseController::class,'details'])->name('admin.lastExpense.details');
            Route::post('/update/{id}', [LastExpenseController::class,'update'])->name('admin.lastExpense.update');
            Route::get('/delete/{id}', [LastExpenseController::class,'delete'])->name('admin.lastExpense.delete');
        });


        Route::prefix('requests')->group(function() {
            Route::prefix('motor')->group(function() {
                Route::get('/', [RequestsController::class,'motor'])->name('admin.reports.motor');
                Route::get('/details/{id}', [RequestsController::class,'motorDetails'])->name('admin.reports.motor.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'motorDelete'])->name('admin.reports.motor.delete');
                Route::get('/motor-circle', [RequestsController::class,'motorCircle'])->name('admin.reports.motorCircle');
                Route::get('/motor-circle/{id}', [RequestsController::class,'motorCircleDetails'])->name('admin.reports.motorCircle.details');
                Route::get('/motor-circle/{id}/delete', [RequestsController::class,'motorCircleDelete'])->name('admin.reports.motorCircle.delete');
            });
            Route::prefix('corporate')->group(function() {
                Route::get('/', [RequestsController::class,'corporate'])->name('admin.reports.corporate');
                Route::get('/details/{id}', [RequestsController::class,'corporateDetails'])->name('admin.reports.corporate.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'corporateDelete'])->name('admin.reports.corporate.delete');
            });
            Route::prefix('personal-accidents')->group(function() {
                Route::get('/', [RequestsController::class,'accidents'])->name('admin.reports.accidents');
                Route::get('/details/{id}', [RequestsController::class,'accidentDetails'])->name('admin.reports.accidents.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'accidentDelete'])->name('admin.reports.accidents.delete');
            });
            Route::prefix('life')->group(function() {
                Route::get('/', [RequestsController::class,'life'])->name('admin.reports.life');
                Route::get('/details/{id}', [RequestsController::class,'lifeDetails'])->name('admin.reports.life.details');
                Route::get('/details/{id}/details', [RequestsController::class,'lifeDelete'])->name('admin.reports.life.delete');
            });
            Route::prefix('health')->group(function() {
                Route::get('/', [RequestsController::class,'health'])->name('admin.reports.health');
                Route::get('/details/{id}', [RequestsController::class,'healthDetails'])->name('admin.reports.health.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'healthDelete'])->name('admin.reports.health.delete');
            });
            Route::prefix('bidBond')->group(function() {
                Route::get('/', [RequestsController::class,'bidBond'])->name('admin.reports.bidBond');
                Route::get('/details/{id}', [RequestsController::class,'bidBodDetails'])->name('admin.reports.bidBond.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'bidBondDelete'])->name('admin.reports.bidBond.delete');
            });
            Route::prefix('performance')->group(function() {
                Route::get('/', [RequestsController::class,'performance'])->name('admin.reports.performance');
                Route::get('/details/{id}', [RequestsController::class,'performanceDetails'])->name('admin.reports.performance.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'performanceDelete'])->name('admin.reports.performance.delete');
            });
            Route::prefix('indemnity')->group(function() {
                Route::get('/', [RequestsController::class,'indemnity'])->name('admin.reports.indemnity');
                Route::get('/details/{id}', [RequestsController::class,'indemnityDetails'])->name('admin.reports.indemnity.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'indemnityDelete'])->name('admin.reports.indemnity.delete');
            });
            Route::prefix('business')->group(function() {
                Route::get('/', [RequestsController::class,'business'])->name('admin.reports.business');
                Route::get('/details/{id}', [RequestsController::class,'businessDetails'])->name('admin.reports.business.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'businessDelete'])->name('admin.reports.business.delete');
            });
            Route::prefix('home')->group(function() {
                Route::get('/', [RequestsController::class,'home'])->name('admin.reports.home');
                Route::get('/details/{id}', [RequestsController::class,'homeDetails'])->name('admin.reports.home.details');
                Route::get('/details/{id}/delete', [RequestsController::class,'homeDelete'])->name('admin.reports.home.delete');
            });
        });


        Route::prefix('newsletter')->group(function() {
            Route::get('/', 'Admin\NewsletterController@emails')->name('admin.newsletter');
        });
        Route::prefix('blog')->group(function() {
            Route::get('/', [BlogsController::class,'blogs'])->name('admin.blogs');
            Route::get('/create', [BlogsController::class,'create'])->name('admin.blog.new');
            Route::get('/read/{slug}/', [BlogsController::class,'read'])->name('admin.blog.read');
            Route::get('/{slug}/blog', [BlogsController::class,'details'])->name('admin.blog.details');
            Route::post('/submit', [BlogsController::class,'submit'])->name('admin.blog.create');
            Route::post('/update/{slug}', [BlogsController::class,'update'])->name('admin.blog.update');
            Route::get('/{slug}/publish', [BlogsController::class,'publish'])->name('admin.blog.publish');
            Route::get('/{slug}/unpublish', [BlogsController::class,'unpublish'])->name('admin.blog.unpublish');
            Route::get('/{id}/delete', [BlogsController::class,'delete'])->name('admin.blog.delete');

        });
    });
});
