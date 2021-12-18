<?php

use Illuminate\Support\Facades\Route;

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
    //return view('welcome');
    return view('home');
});

use App\Http\Controllers\PollController;
//Route::resource('-', PollController::class);
Route::get('/-', [PollController::class, 'index'])->name('poll.index');
Route::get('/-/{slug}', [PollController::class, 'input'])->name('poll.input');
