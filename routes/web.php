<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ProfileController;

Route::get('/dashboard', function () {
    if (auth()->user()->usertype === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Public Frontend Routes */
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/services', [PublicController::class, 'services'])->name('services');
Route::get('/projects', [PublicController::class, 'projects'])->name('projects');

/* Public Review Routes */
Route::get('/reviews', [ReviewsController::class, 'index'])->name('reviews');
Route::post('/reviews', [ReviewsController::class, 'store'])->name('reviews.store');

Route::get('/contact', [PublicController::class, 'contact'])->name('contact');

/* Estimate Request Form Routes (Public) */
Route::get('/get-quote', [PublicController::class, 'quoteForm'])->name('quote');
Route::post('/get-quote', [PublicController::class, 'storeQuote'])->name('quote.store');

/* Authenticated User Profile Routes */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Secured Admin Management Area */
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Estimates Management
    Route::get('/estimates', [AdminController::class, 'estimates'])->name('estimates.index');
    Route::post('/estimates/status/{id}', [AdminController::class, 'updateEstimateStatus'])->name('estimates.status');
    Route::delete('/estimates/{id}', [AdminController::class, 'destroyEstimate'])->name('estimates.destroy');
    
    // Projects CRUD
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Services CRUD
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Reviews Management
    Route::get('/reviews', [ReviewsController::class, 'adminIndex'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewsController::class, 'create'])->name('reviews.create');
    Route::post('/reviews/store', [ReviewsController::class, 'adminStore'])->name('reviews.store');
    Route::get('/reviews/{id}/edit', [ReviewsController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{id}', [ReviewsController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{id}', [ReviewsController::class, 'destroy'])->name('reviews.destroy');
});

require __DIR__.'/auth.php';