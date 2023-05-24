<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Chat;
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

Route::get('/', [LoginController::class, 'showFormLogin']);
Route::get('/login', [LoginController::class, 'showFormLogin']);
Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/chat', Chat::class)->name('chat');
});