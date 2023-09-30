<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
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

Route::get('/dashboard', [TenantController::class, 'indexDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Tenants
Route::prefix('tenant')->group(function () {
    // Show create form
    Route::get('/create', [TenantController::class, 'create']);
    // Store tenant data
    Route::post('/', [TenantController::class, 'store']);
})->middleware(['auth', 'verified'])->name('tenant');

require __DIR__.'/auth.php';
