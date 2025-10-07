<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\ReportController;

Route::get('/', function() { return view('welcome'); });

// Equipment CRUD
Route::resource('equipment', EquipmentController::class);

// Borrow an item
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');

// Return an item
Route::post('/return/{id}', [ReturnController::class, 'update'])->name('return.update');

// Reports
Route::get('/report/borrow', [ReportController::class, 'borrowReport'])->name('report.borrow');

