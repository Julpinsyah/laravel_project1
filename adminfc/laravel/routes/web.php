<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SlideProfileController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\KonfigController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\PemainController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\TandingController;
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


Route::middleware('auth')->group(function(){
  Route::get('/',[HomeController::class,'index'])->name('home');
  Route::delete('/logout', [AuthController::class,'destroy'])->name('logout');
  Route::resource('/admin', AdminController::class);
  Route::get('/ubahpass', [AdminController::class,'editPass'])->name('ubahpass');
  Route::put('/ubahpass/{admin}', [AdminController::class,'changePassword'])->name('updatepass');
  Route::put('/user/{admin}', [AdminController::class,'adminupdate'])->name('adminupdate');
  Route::get('/user', [AdminController::class,'useradmin'])->name('useradmin')->middleware('cekrole');
  Route::get('/user/{user}/edit', [AdminController::class,'edituseradmin'])->name('editadmin')->middleware('cekrole');
  
  Route::resource('/news', NewsController::class);
  Route::resource('/banner',BannerController::class)->middleware('cekrole');
  Route::resource('/galery',GaleryController::class)->middleware('cekrole');
  Route::resource('/slide',SlideController::class)->middleware('cekrole');
  Route::resource('/slideprofile',SlideProfileController::class)->middleware('cekrole');
  Route::resource('/sponsor',SponsorController::class)->middleware('cekrole');
  Route::resource('/konfig',KonfigController::class)->middleware('cekrole');
  Route::resource('/informasi',InformasiController::class)->middleware('cekrole');
  Route::resource('/posisi',PosisiController::class)->middleware('cekrole');
  Route::resource('/video',VideoController::class);
  Route::resource('/histori',HistoriController::class)->middleware('cekrole');
  Route::resource('/club',ClubController::class)->middleware('cekrole');
  Route::resource('/latihan',JadwalLatihanController::class);
  Route::resource('/pertandingan',PertandinganController::class);
  Route::resource('/tanding',TandingController::class);
  Route::resource('/pemain',PemainController::class)->middleware('cekrole');
  Route::resource('/pengurus',PengurusController::class)->middleware('cekrole');
});

Route::middleware('guest')->group(function(){
  Route::get('/login',[AuthController::class,'login'])->name('login');
  Route::post('/login',[AuthController::class,'authenticate'])->name('login.auth');
  Route::get('/register', [AuthController::class,'register'])->name('register');
  Route::post('/register', [AuthController::class,'store'])->name('register.store');
});




