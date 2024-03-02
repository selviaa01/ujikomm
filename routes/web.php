<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\TrxPinjamController;
use App\Http\Controllers\TrxKembaliController;
use App\Http\Controllers\ReportController;

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


  
Route::get('/', [AuthController::class, 'dashboard']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Route::get('/users', [UserController::class, 'index'])->name('users');
Route::resource('users', UserController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::resource('anggotas', AnggotaController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::get('anggota/showall', [AnggotaController::class, 'showAll'])->name('anggota.all'); 
// Route::get('ruangans', [RuangController::class, 'indexPage'])->name('ruangans.page');

Route::resource('koleksis', KoleksiController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::get('koleksi/showall', [KoleksiController::class, 'showAll'])->name('koleksi.all'); 

Route::resource('pinjams', TrxPinjamController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::resource('kembalis', TrxKembaliController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::resource('reports', ReportController::class); //users.index, users.create, users.edit, users.update, users.destroy
Route::post('/report/pdf', 'ReportController@generatePDF')->name('report.pdf');