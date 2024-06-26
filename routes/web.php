<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jobs;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/detail/{id}', [Jobs::class, 'detail']);

Route::get('/', [Jobs::class, 'list']);
Route::post('/', [Jobs::class, 'list']);

Route::get('/add-job', [Jobs::class, 'add']);
Route::post('/job', [Jobs::class, 'store']);

Route::post('/login', [SessionController::class, 'login']);
Route::get('/logout', [SessionController::class, 'logout']);

