<?php
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BookingEnquiryController;
use App\Http\Controllers\Frontend\CarsController as FrontendCarsController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\ServicesController;

use App\Http\Controllers\Admin\AboutCompanyController;
use App\Http\Controllers\Admin\AboutMissionController;
use App\Http\Controllers\Admin\AboutSpecializationCardController;
use App\Http\Controllers\Admin\BookingEnquiriesController;
use App\Http\Controllers\Admin\CarEnquiriesController;
use App\Http\Controllers\Admin\CarsController as AdminCarsController;
use App\Http\Controllers\Admin\GalleryItemsController;
use App\Http\Controllers\Admin\HomeHeroSlideController;
use App\Http\Controllers\Admin\ServiceCardController;
use App\Http\Controllers\Admin\ServiceHighlightController;
use App\Http\Controllers\Admin\ServiceIntroController;
use App\Http\Controllers\Admin\TestimonialController;

Route::get('/', [HomePageController::class, 'index'])->name('frontend.home');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

 Route::get('about-companies', [AboutCompanyController::class, 'index'])->name('about-companies.index');
    Route::put('about-companies', [AboutCompanyController::class, 'update'])->name('about-companies.update');

    Route::get('about-missions', [AboutMissionController::class, 'index'])->name('about-missions.index');
    Route::put('about-missions', [AboutMissionController::class, 'update'])->name('about-missions.update');
    Route::resource('about-specialization-cards', AboutSpecializationCardController::class);

    Route::get('service-intros', [ServiceIntroController::class, 'index'])->name('service-intros.index');
    Route::put('service-intros', [ServiceIntroController::class, 'update'])->name('service-intros.update');
    Route::get('service-highlights', [ServiceHighlightController::class, 'index'])->name('service-highlights.index');
    Route::put('service-highlights', [ServiceHighlightController::class, 'update'])->name('service-highlights.update');
    Route::resource('service-cards', ServiceCardController::class);
    Route::resource('cars', AdminCarsController::class);
    Route::resource('car-enquiries', CarEnquiriesController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('booking-enquiries', BookingEnquiriesController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('gallery-items', GalleryItemsController::class);
    Route::resource('home-hero-slides', HomeHeroSlideController::class);
    Route::resource('testimonials', TestimonialController::class);

    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/services', [ServicesController::class, 'index'])->name('frontend.services');
Route::get('/cars', [FrontendCarsController::class, 'index'])->name('frontend.cars');
Route::get('/cars/{car:slug}', [FrontendCarsController::class, 'show'])->name('frontend.cars.show');
Route::post('/cars/{car:slug}/enquiry', [FrontendCarsController::class, 'storeEnquiry'])->name('frontend.cars.enquiry');
Route::get('/booking-enquiry', [BookingEnquiryController::class, 'create'])->name('frontend.booking-enquiry');
Route::post('/booking-enquiry', [BookingEnquiryController::class, 'store'])->name('frontend.booking-enquiry.store');
Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.gallery');
