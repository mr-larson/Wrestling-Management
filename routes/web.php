<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\WorkerController;  
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('management')->group(function () {
    //Promotion
    Route::get('promotion/search', [PromotionController::class, 'search'])->name('promotion.search');
    Route::resource('promotion', PromotionController::class);
    //Worker
    Route::get('worker/search', [WorkerController::class, 'search'])->name('worker.search');
    Route::patch('/workers/{worker}/update-score', [WorkerController::class, 'updateScore'])->name('worker.updateScore');
    Route::patch('/workers/{worker}/reset_score', [WorkerController::class, 'resetScore'])->name('worker.resetScore');
    Route::resource('worker', WorkerController::class);
});


require __DIR__.'/auth.php';
