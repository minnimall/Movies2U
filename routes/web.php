<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Models\User;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home',[MoviesController::class,('home')]);
Route::get('/moviemanagement',[MoviesController::class,'manage']);
Route::get('/moviemanagement/forminsertmovie',[MoviesController::class,'movieform']);
Route::get('/moviedetail/{movieId}', [MoviesController::class,'showMovieDetails']);
Route::post('/moviemanagement/insert',[MoviesController::class,'insertMovie']);
Route::get('/movie/edit/{id}',[MoviesController::class, 'edit']);
Route::post('/movie/update',[MoviesController::class, 'update']);
Route::get('/moviemanagement/delete/{id}', [MoviesController::class,'deleteMovie']);

Route::get('/type/{Id}', [MoviesController::class,'showType']);
Route::get('/category', [MoviesController::class,'category']);
