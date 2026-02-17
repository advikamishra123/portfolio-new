<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

Route::get('/', [PortfolioController::class, 'index'])->name('portfolio');
Route::post('/contact', [PortfolioController::class, 'store'])->name('contact.store');
Route::get('/contact', function () {
    return redirect('/#contact');
})->name('contact.index');
Route::get('/resume/download', function() {
    return response()->download(public_path('resume.pdf'), 'Sagun_Mishra_Resume.pdf');
})->name('resume.download');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Protected Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('projects', ProjectController::class);
        Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    });
});
