<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CaregiverController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::resource('services', ServiceController::class)->only(['index', 'show']);
Route::resource('caregivers', CaregiverController::class)->only(['index', 'show']);

Route::get('/shop', [FrontendController::class, 'shop'])->name('shop.index');
Route::get('/product/{slug}', [FrontendController::class, 'productShow'])->name('shop.show');

Route::get('/doctors', [FrontendController::class, 'doctors'])->name('doctors.index');
Route::get('/doctor/{id}', [FrontendController::class, 'doctorShow'])->name('doctors.show');
Route::get('/departments', [FrontendController::class, 'departments'])->name('departments.index');
Route::get('/department/{slug}', [FrontendController::class, 'departmentShow'])->name('departments.show');

Route::get('/photo-gallery', [FrontendController::class, 'gallery'])->name('gallery.index');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs.index');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin Auth Routes
Route::get('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [App\Http\Controllers\Auth\AdminLoginController::class, 'login'])->middleware('guest');

// Admin Routes
Route::middleware(['auth', 'role:Admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('menus', App\Http\Controllers\Admin\MenuController::class);
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
    Route::resource('departments', App\Http\Controllers\Admin\DepartmentController::class);
    Route::resource('doctor-profiles', App\Http\Controllers\Admin\DoctorProfileController::class);
    Route::resource('caregivers', App\Http\Controllers\Admin\CaregiverController::class);
    Route::resource('packages', App\Http\Controllers\Admin\PackageController::class);
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('pre-orders', App\Http\Controllers\Admin\PreOrderRequestController::class);

    // FAQ & Gallery
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class);
    Route::resource('gallery-categories', App\Http\Controllers\Admin\GalleryCategoryController::class);
    Route::resource('gallery-images', App\Http\Controllers\Admin\GalleryImageController::class);

    // Site Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
    
    Route::get('/smtp', [App\Http\Controllers\Admin\SettingController::class, 'smtp'])->name('admin.smtp.index');
    Route::post('/smtp', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.smtp.update');
    
    Route::get('/social-media', [App\Http\Controllers\Admin\SettingController::class, 'social'])->name('admin.social.index');
    Route::post('/social-media', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.social.update');

    Route::get('/payment-settings', [App\Http\Controllers\Admin\SettingController::class, 'payment'])->name('admin.payment.index');
    Route::post('/payment-settings', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.payment.update');

    // Booking Management
    Route::get('/bookings', [App\Http\Controllers\Admin\BookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/bookings/{booking}', [App\Http\Controllers\Admin\BookingController::class, 'show'])->name('admin.bookings.show');
    Route::patch('/bookings/{booking}/status', [App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
    Route::patch('/bookings/{booking}/payment', [App\Http\Controllers\Admin\BookingController::class, 'updatePayment'])->name('admin.bookings.updatePayment');
});

// SEO Sitemap
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');


Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}/invoice', [BookingController::class, 'invoice'])->name('bookings.invoice');
    Route::patch('/bookings/{booking}/payment', [BookingController::class, 'submitPayment'])->name('bookings.submitPayment');
});

require __DIR__.'/auth.php';

// Dynamic Pages (Catch-all) - Place at the end
Route::get('/{slug}', [App\Http\Controllers\FrontendController::class, 'showPage'])->name('pages.show');
