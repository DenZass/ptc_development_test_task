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

Route::middleware('role.checking')->group(function () {
    Route::get('/notes', function () {
        return response()->json([
            ['id' => 1, 'title' => 'Первая'],
            ['id' => 2, 'title' => 'Вторая'],
        ]);
    })->name('notes');
});


Route::get('/forbidden', function () {
    return response()->json([
        'error' => 'Access Denied'
    ], 403);
})->name('forbidden');

