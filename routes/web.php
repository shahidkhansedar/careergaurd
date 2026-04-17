<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Roles Routes
    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles/store', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
    Route::post('/roles/update/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/delete/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
    Route::post('/roles/status/{id}', [App\Http\Controllers\RoleController::class, 'toggleStatus'])->name('roles.status');

    // Staff Routes
    Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/edit/{slug}', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
    Route::post('/staff/update/{slug}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/delete/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy');
    Route::delete('/staff/delete-document/{id}', [App\Http\Controllers\StaffController::class, 'deleteDocument'])->name('staff.delete-document');
    // Ensure the ID parameter is named consistently with the controller method
    Route::post('/staff/status/{id}', [App\Http\Controllers\StaffController::class, 'toggleStatus'])->name('staff.status');
});

require __DIR__ . '/auth.php';
