<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('equipment', EquipmentController::class);
    Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
    Route::post('/return/{id}', [ReturnController::class, 'update'])->name('return.update');
    Route::get('/report/borrow', [ReportController::class, 'borrowReport'])->name('report.borrow');
});

use Illuminate\Support\Facades\Auth;

require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
