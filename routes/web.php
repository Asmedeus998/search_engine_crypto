<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserContorller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home.show');


Auth::routes();


Route::get('/update/{id}', [HomeController::class, 'update'])->name('home.update');
Route::post('/update/{id}', [HomeController::class, 'update'])->name('home.update');

Route::post('/search',[UserContorller::class, 'search'])->name('users.search');
Route::get('/search',[UserContorller::class, 'search'])->name('users.search');

Route::group(['prefix' => '/admin', 'middleware' => ['validateAdmin', 'auth']], function (){
    Route::get('/users', [UserContorller::class, 'view']);
    Route::delete('/user/{id}', [UserContorller::class, 'delete']);
});
