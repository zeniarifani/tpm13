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
// Route::get('/showAll',[CustomAuthController::class,'showAll'])->name('showAll');
Route::get('/forgetpass',[CustomAuthController::class,'forgetpass'])->name('forgetpass');
Route::get('/admin', [CustomAuthController::class, 'showAll'])->name('admin.showAll');
Route::get('/Register',[CustomAuthController::class,'Register'])->name('Register');
Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::get('/edit/{id}', [CustomAuthController::class, 'edit'])->name('edit');
Route::get('/search', [CustomAuthController::class, 'search'])->name('search');
Route::get('/nodata', [CustomAuthController::class, 'nodata'])->name('nodata');
Route::get('/admin', [CustomAuthController::class, 'sort'])->name('admin.sort');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
// });

Route::post('/registerTeam',[CustomAuthController::class,'registerTeam'])->name('registerTeam');
Route::post('/loginTeam',[CustomAuthController::class,'loginTeam'])->name('loginTeam');
Route::patch('/update/{id}',[CustomAuthController::class,'update'])->name('update');
Route::delete('/delete/{id}',[CustomAuthController::class,'delete'])->name('delete');



