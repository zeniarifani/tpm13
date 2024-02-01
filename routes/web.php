<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
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
    return view('homepage');
});
Route::get('/Register', function () {
    return view('Register');
});
Route::get('/Register2', function () {
    return view('Register2');
});
Route::get('/Register3', function () {
    return view('Register3');
});
// Route::get('/login',[CustomAuthController::class,'login']);
// Route::get('/Register',[CustomAuthController::class,'Register']);
// Route::post('/register-team',[CustomAuthController::class,'registerTeam'])->name('register-team');
// Route::post('/login-team',[CustomAuthController::class,'loginTeam'])->name('login-team');
// Route::get('/dashboard', 'CustomAuthController@index')->name('dashboard');

