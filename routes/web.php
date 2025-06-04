<?php

use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;

Route::get('/cv', [CvController::class, 'index']);
Route::get('/cv/download', [CvController::class, 'download'])->name('cv.download');
