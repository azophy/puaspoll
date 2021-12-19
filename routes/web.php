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
Route::resource('/polls', PollController::class)->only([
    'index', 'create', 'store',
]);
Route::get('/-/{slug}', [PollController::class, 'show'])->name('polls.show');
Route::get('/-/{slug}/embed', [PollController::class, 'embed'])->name('polls.embed');
Route::post('/-/{slug}', [PollController::class, 'input'])->name('polls.input');
Route::post('/-/{slug}/embed', [PollController::class, 'embed'])->name('polls.input_embed');
Route::get('/-/{slug}/result', [PollController::class, 'result'])->name('polls.result');
