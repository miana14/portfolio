<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\FrontQuoteController;
use App\Http\Controllers\FrontController;


// Page d’accueil : redirige vers login
Route::get('/', function () {
    return redirect()->route('login');
});

// Portfolio public (one-page)
Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');


// Dashboard après connexion (lien vers admin + vers portfolio possible)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/quote-request', [QuoteRequestController::class, 'store'])->name('quote-request.store');
Route::get('/quote-request', function () {
    $services = \App\Models\Service::all();
    return view('quote-request', compact('services'));
})->name('quote-request.form');


// Routes back-office (admin) protégées par auth
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

    Route::resource('projects', ProjectController::class);
    Route::resource('messages', MessageController::class);
    Route::post('/messages/{id}/mark-as-read', [MessageController::class, 'markAsRead'])->name('messages.mark-as-read');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/quote-requests', [QuoteRequestController::class, 'index'])->name('quote-requests.index');

});

// Authentification : profile général
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth scaffolding
require __DIR__.'/auth.php';
