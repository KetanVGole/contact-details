<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImportController;

Route::get('/', [ContactController::class, 'index']);
Route::resource('contacts', ContactController::class);
Route::post('import-contacts', [ImportController::class, 'importXML'])->name('contacts.import');
