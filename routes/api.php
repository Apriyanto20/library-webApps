<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MajorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('majors', [MajorController::class, 'index'])->name('api.majors.index');
Route::post('majorsAdd', [MajorController::class, 'store'])->name('majors.store');
Route::patch('majorsUpdate/{id}', [MajorController::class, 'update'])->name('majors.update');
Route::delete('majorsDelete/{id}', [MajorController::class, 'destroy'])->name('majors.destroy');

Route::post('facultyAdd', [FacultyController::class, 'store'])->name('faculty.store');
Route::patch('facultyUpdate/{id}', [FacultyController::class, 'update'])->name('faculty.update');
Route::delete('facultyDelete/{id}', [FacultyController::class, 'destroy'])->name('faculty.destroy');

Route::post('bookAdd', [BookController::class, 'store'])->name('book.store');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
