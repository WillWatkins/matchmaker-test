<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/download-data/store', [App\Http\Controllers\DownloadController::class, 'store'])->name('storeData');
Route::get('/download-data/daily-downloads', [App\Http\Controllers\DownloadController::class, 'getDailyDownloads'])->name('dailyDownloads');
