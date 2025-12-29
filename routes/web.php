<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{locale}', [HomeController::class, 'index'])->name('home.locale')->where('locale', 'en|kn');
Route::get('/switch-language/{locale}', function ($locale) {
    if (in_array($locale, config('app.available_locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('switch.language');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes (not authenticated)
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminController::class, 'login']);
    });
    
    // Protected routes (authenticated admin only)
    Route::middleware(['auth', App\Http\Middleware\AdminMiddleware::class])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Manage Home Routes
        Route::get('/manage-slider', [AdminController::class, 'manageSlider'])->name('manage.slider');
        Route::post('/manage-slider', [AdminController::class, 'storeSlider'])->name('manage.slider.store');
        Route::put('/manage-slider/{slider}', [AdminController::class, 'updateSlider'])->name('manage.slider.update');
        Route::delete('/manage-slider/{slider}', [AdminController::class, 'destroySlider'])->name('manage.slider.destroy');
        Route::get('/manage-hero-content', [AdminController::class, 'manageHeroContent'])->name('manage.hero.content');
        Route::get('/manage-impact-numbers', [AdminController::class, 'manageImpactNumbers'])->name('manage.impact.numbers');
        Route::get('/manage-mission', [AdminController::class, 'manageMission'])->name('manage.mission');
        
        // Other Management Routes
        Route::get('/manage-pages', [AdminController::class, 'managePages'])->name('manage.pages');
        Route::get('/manage-visual-media', [AdminController::class, 'manageVisualMedia'])->name('manage.visual.media');
        Route::get('/manage-paper-clips', [AdminController::class, 'managePaperClips'])->name('manage.paper.clips');
        Route::get('/manage-gallery', [AdminController::class, 'manageGallery'])->name('manage.gallery');
        Route::get('/manage-enquiries', [AdminController::class, 'manageEnquiries'])->name('manage.enquiries');
        Route::get('/manage-newsletter', [AdminController::class, 'manageNewsletter'])->name('manage.newsletter');
        
        // Keep settings route for header and dashboard references
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
