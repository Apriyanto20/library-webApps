<?php

use App\Http\Controllers\MajorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('majors', [MajorController::class, 'index'])->name('api.majors.index');
Route::post('majorsAdd', [MajorController::class, 'store'])->name('majors.store');
Route::patch('majorsUpdate/{id}', [MajorController::class, 'update'])->name('majors.update');
Route::delete('majorsDelete/{id}', [MajorController::class, 'destroy'])->name('majors.destroy');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
