<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SongController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\HelpInstructionController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DonateController;
use App\Http\Controllers\Admin\ManageCustomersController;

Route::get('/admin', [LoginController::class, 'index'])->name('index');
Route::get('/check-payment-period', [ManageCustomersController::class, 'checkPaymentPeriod'])->name('check-payment-period');
Route::get('/remainder-mail', [ManageCustomersController::class, 'remainderMail'])->name('remainder-mail');

Route::group(['prefix' => 'admin','as','admin.','namespace' => 'Admin'], function () {

    Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
}); 

Route::group(['prefix' => 'admin','as','admin.','namespace' => 'Admin','middleware' => ['auth','admin']], function () {

    Route::get('/admindashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboardSearch', [DashboardController::class, 'search'])->name('dashboard.search');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {

        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'apps', 'as' => 'apps.'], function () {

        Route::get('/', [SongController::class, 'index'])->name('index');
        Route::get('/create', [SongController::class, 'create'])->name('create');
        Route::post('/store', [SongController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SongController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SongController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [SongController::class, 'delete'])->name('delete');
        Route::get('/search', [SongController::class, 'search'])->name('search');

    });

// for manage customers
        Route::group(['prefix' => 'manage-customers', 'as' => 'manage-customers.'], function () {
        Route::get('/', [ManageCustomersController::class, 'index'])->name('manage');
        Route::get('/create', [ManageCustomersController::class, 'create'])->name('create'); 

        Route::post('/store', [ManageCustomersController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ManageCustomersController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ManageCustomersController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [ManageCustomersController::class, 'delete'])->name('delete');
        
        Route::get('/search', [ManageCustomersController::class, 'search'])->name('search');
        Route::get('/payment-period/{id}', [ManageCustomersController::class, 'paymentperiod'])->name('payment-period');
        Route::get('/payment-period/make-payment/{id}', [ManageCustomersController::class, 'customerstatusupdate'])->name('makepayment');

        });

//for privacy policy 

    Route::get('/privacy-policy-english', [PrivacyPolicyController::class, 'createEnglish'])->name('privacy-policy-english');
    Route::post('/privacy-policy-english/store', [PrivacyPolicyController::class, 'storeEnglish'])->name('privacy-policy-english.store');
    Route::get('/privacy-policy-spanish', [PrivacyPolicyController::class, 'createSpanish'])->name('privacy-policy-spanish');
    Route::post('/privacy-policy-spanish/store', [PrivacyPolicyController::class, 'storeSpanish'])->name('privacy-policy-spanish.store');
   
//for help instruction

    Route::get('/help-instruction-english', [HelpInstructionController::class, 'createEnglish'])->name('help-instruction-english');
    Route::post('/help-instruction/store', [HelpInstructionController::class, 'storeEnglish'])->name('help-instruction-english.store');
    Route::get('/help-instruction-spanish', [HelpInstructionController::class, 'createSpanish'])->name('help-instruction-spanish');
    Route::post('/help-instruction-spanish/store', [HelpInstructionController::class, 'storeSpanish'])->name('help-instruction-spanish.store');
    

// for contact us

    Route::get('/contact-us', [ContactUsController::class, 'create'])->name('contact-us');
    Route::post('/contact-us/store', [ContactUsController::class, 'store'])->name('contact-us.store');
 
// for donate

    Route::get('/donate', [DonateController::class, 'create'])->name('donate');
    Route::post('/donate/store', [DonateController::class, 'store'])->name('donate.store');

//update logo

    Route::get('update-logo', [SiteSettingController::class, 'logo'])->name('update-logo');
    Route::post('update-logo', [SiteSettingController::class, 'updatelogo'])->name('update-logo');
});
