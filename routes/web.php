<?php

use App\Http\Controllers\MenuController;
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

    // Show create menu form
    Route::get('/{tenant_id}/menu/create', [MenuController::class, 'create']);

    // Store tenant data
    Route::post('/', [TenantController::class, 'store']);

    // Show detail page
    Route::get('/{tenant_id}', [TenantController::class, 'showDashboard']);
})->middleware(['auth', 'verified'])->name('tenant');

Route::prefix('menu')->group(function() {
    // Store menu data
    Route::post('/', [MenuController::class, 'store']);
})->middleware(['auth', 'verified'])->name('menu');

require __DIR__.'/auth.php';
