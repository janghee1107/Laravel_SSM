<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbookController;
use App\Http\Controllers\WbookController;
use App\Http\Controllers\JbookController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::resource( 'dbook', DbookController::class );
Route::resource( 'wbook', WbookController::class );
Route::resource( 'jbook', JbookController::class );
