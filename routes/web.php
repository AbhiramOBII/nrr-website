<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MajorDevelopmentController;
use App\Http\Controllers\ScamExposedController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PrintMediaController;
use App\Http\Controllers\ElectronicMediaController;
use App\Http\Controllers\PhotoGalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OfficialMediaController;
use App\Http\Controllers\BlogController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/{locale}', [HomeController::class, 'index'])->name('home.locale')->where('locale', 'en|kn');
Route::get('/switch-language/{locale}', function ($locale) {
    if (in_array($locale, config('app.available_locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('switch.language');

// Public Detail Pages
Route::get('/major-developments', [MajorDevelopmentController::class, 'publicIndex'])->name('major-developments.public');
Route::get('/major-development/{slug}', [MajorDevelopmentController::class, 'show'])->name('major-development.show');
Route::get('/scams-exposed', [ScamExposedController::class, 'publicIndex'])->name('scams-exposed.public');
Route::get('/scam-exposed/{slug}', [ScamExposedController::class, 'show'])->name('scam-exposed.show');

// Events
Route::get('/events', [EventController::class, 'publicIndex'])->name('events.index');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event.show');

// Print Media
Route::get('/print-media', [PrintMediaController::class, 'publicIndex'])->name('print-media.index');

// Photo Gallery
Route::get('/photo-gallery', [PhotoGalleryController::class, 'index'])->name('photo-gallery.index');

// Electronic Media
Route::get('/electronic-media', [ElectronicMediaController::class, 'publicIndex'])->name('electronic-media.index');

// Official Media
Route::get('/official-media', [OfficialMediaController::class, 'publicIndex'])->name('official-media.index');

// Blogs
Route::get('/blogs', [BlogController::class, 'publicIndex'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

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
        
        // Media Library Routes
        Route::get('/media', [MediaController::class, 'index'])->name('media.index');
        Route::post('/media', [MediaController::class, 'store'])->name('media.store');
        Route::put('/media/{media}', [MediaController::class, 'update'])->name('media.update');
        Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
        Route::get('/media/picker', [MediaController::class, 'picker'])->name('media.picker');
        
        // Slider Routes
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
        
        // Major Developments Routes
        Route::get('/major-developments', [MajorDevelopmentController::class, 'index'])->name('major-developments.index');
        Route::get('/major-developments/create', [MajorDevelopmentController::class, 'create'])->name('major-developments.create');
        Route::post('/major-developments', [MajorDevelopmentController::class, 'store'])->name('major-developments.store');
        Route::get('/major-developments/{majorDevelopment}/edit', [MajorDevelopmentController::class, 'edit'])->name('major-developments.edit');
        Route::put('/major-developments/{majorDevelopment}', [MajorDevelopmentController::class, 'update'])->name('major-developments.update');
        Route::delete('/major-developments/{majorDevelopment}', [MajorDevelopmentController::class, 'destroy'])->name('major-developments.destroy');
        
        // Scams Exposed Routes
        Route::get('/scams-exposed', [ScamExposedController::class, 'index'])->name('scams-exposed.index');
        Route::get('/scams-exposed/create', [ScamExposedController::class, 'create'])->name('scams-exposed.create');
        Route::post('/scams-exposed', [ScamExposedController::class, 'store'])->name('scams-exposed.store');
        Route::get('/scams-exposed/{scamExposed}/edit', [ScamExposedController::class, 'edit'])->name('scams-exposed.edit');
        Route::put('/scams-exposed/{scamExposed}', [ScamExposedController::class, 'update'])->name('scams-exposed.update');
        Route::delete('/scams-exposed/{scamExposed}', [ScamExposedController::class, 'destroy'])->name('scams-exposed.destroy');
        
        // Events Routes
        Route::get('/events', [EventController::class, 'index'])->name('events.index');
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
        
        // Print Media Routes
        Route::get('/print-media', [PrintMediaController::class, 'index'])->name('print-media.index');
        Route::get('/print-media/create', [PrintMediaController::class, 'create'])->name('print-media.create');
        Route::post('/print-media', [PrintMediaController::class, 'store'])->name('print-media.store');
        Route::get('/print-media/{printMedia}/edit', [PrintMediaController::class, 'edit'])->name('print-media.edit');
        Route::put('/print-media/{printMedia}', [PrintMediaController::class, 'update'])->name('print-media.update');
        Route::delete('/print-media/{printMedia}', [PrintMediaController::class, 'destroy'])->name('print-media.destroy');
        
        // Electronic Media Routes
        Route::get('/electronic-media', [ElectronicMediaController::class, 'index'])->name('electronic-media.index');
        Route::get('/electronic-media/create', [ElectronicMediaController::class, 'create'])->name('electronic-media.create');
        Route::post('/electronic-media', [ElectronicMediaController::class, 'store'])->name('electronic-media.store');
        Route::get('/electronic-media/{electronicMedia}/edit', [ElectronicMediaController::class, 'edit'])->name('electronic-media.edit');
        Route::put('/electronic-media/{electronicMedia}', [ElectronicMediaController::class, 'update'])->name('electronic-media.update');
        Route::delete('/electronic-media/{electronicMedia}', [ElectronicMediaController::class, 'destroy'])->name('electronic-media.destroy');
        
        // Photo Gallery Routes
        Route::get('/photo-gallery', [PhotoGalleryController::class, 'adminIndex'])->name('photo-gallery.index');
        Route::post('/photo-gallery', [PhotoGalleryController::class, 'adminUpdate'])->name('photo-gallery.update');
        
        // Official Media Routes
        Route::get('/official-media', [OfficialMediaController::class, 'index'])->name('official-media.index');
        Route::get('/official-media/create', [OfficialMediaController::class, 'create'])->name('official-media.create');
        Route::post('/official-media', [OfficialMediaController::class, 'store'])->name('official-media.store');
        Route::get('/official-media/{officialMedia}/edit', [OfficialMediaController::class, 'edit'])->name('official-media.edit');
        Route::put('/official-media/{officialMedia}', [OfficialMediaController::class, 'update'])->name('official-media.update');
        Route::delete('/official-media/{officialMedia}', [OfficialMediaController::class, 'destroy'])->name('official-media.destroy');
        
        // Blogs Routes
        Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        
        // Manage Home Routes (kept for backwards compatibility)
        Route::get('/manage-slider', [AdminController::class, 'manageSlider'])->name('manage.slider');
        Route::post('/manage-slider', [AdminController::class, 'storeSlider'])->name('manage.slider.store');
        Route::put('/manage-slider/{slider}', [AdminController::class, 'updateSlider'])->name('manage.slider.update');
        Route::delete('/manage-slider/{slider}', [AdminController::class, 'destroySlider'])->name('manage.slider.destroy');
        Route::get('/manage-hero-content', [AdminController::class, 'manageHeroContent'])->name('manage.hero.content');
        Route::get('/manage-impact-numbers', [AdminController::class, 'manageImpactNumbers'])->name('manage.impact.numbers');
        Route::get('/manage-mission', [AdminController::class, 'manageMission'])->name('manage.mission');
        
        // Other Management Routes (kept for backwards compatibility)
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
