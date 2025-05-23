<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('c')->group(function () {
Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->middleware('auth')->name('contacts.create');
Route::post('/contacts', [ContactController::class, 'store'])->middleware('auth')->name('contacts.store');

Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->middleware('auth')->name('contacts.destroy');


Route::get('contacts/trashed', [ContactController::class, 'trashed'])->name('contacts.trashed');
Route::post('contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
Route::delete('contacts/{id}/forceDelete', [ContactController::class, 'forceDelete'])->name('contacts.forceDelete');
//Route::get('/students', [ContactController::class, 'index']);
Route::resource('contacts', ContactController::class);

Route::get('/email', [FormController::class, 'submit'])->name('submitG.form');
Route::post('/email', [FormController::class, 'submit'])->name('submit.form');

Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);


});