<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\Otentikasi\OtentikasiController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/',function(){
	return view('welcome');
});

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name('index');
Route::post('/', [LoginController::class, 'login'])->name('index');

// //tampil halaman
//Route::group(['middleware' => 'CekLoginMiddleware'], function()
Route::group(['middleware' => 'auth'], function(){
	Route::get('dashboard', [CrudController::class, 'home'])->name('dashboard');
	Route::post('dashboard', [CrudController::class, 'search'])->name('search');
	Route::get('lokasiadm', [CrudController::class, 'lokasiadm'])->name('locadm');
	Route::get('inputdata', [CrudController::class, 'inputdata'])->name('inputdata');
	Route::post('inputdata', [CrudController::class, 'searchdate'])->name('searchdate');
	Route::get('inputdata/add', [CrudController::class, 'lokasi'])->name('tambahdata');
	Route::get('user/add', [CrudController::class, 'role'])->name('tambahuser');
	Route::get('lokasiadm/add', [CrudController::class, 'kecamatan'])->name('tambahadm');
	Route::get('user', [CrudController::class, 'user'])->name('user');

	Route::get('stat', [CrudController::class, 'stat'])->name('stat');
	Route::get('logout', [OtentikasiController::class, 'logout'])->name('logout');

	//DATA
	//add data
	Route::post('inputdata/add/save', [CrudController::class, 'adddata'])->name('savedata');
	//delete data
	Route::delete('inputdata/delete/{id}', [CrudController::class, 'deletedata'])->name('deletedata');
	//edit data
	Route::get('inputdata/{id}/edit', [CrudController::class, 'editdata'])->name('editdata');
	//simpan edit data
	Route::patch('inputdata/{id}', [CrudController::class, 'updatedata'])->name('updatedata');

	//ADM
	//add adm
	Route::post('loaksiadm/add/save', [CrudController::class, 'addadm'])->name('saveadm');
	//delete adm
	Route::delete('lokasiadm/delete/{id}', [CrudController::class, 'deleteadm'])->name('deleteadm');
	//edit adm
	Route::get('lokasiadm/{id}/edit', [CrudController::class, 'editadm'])->name('editadm');
	//simpan edit adm
	Route::patch('lokasiadm/{id}', [CrudController::class, 'updateadm'])->name('updateadm');

	//USER
	//add user
	Route::post('user/add/save', [CrudController::class, 'adduser'])->name('saveuser');
	//delete user
	Route::delete('user/delete/{id}', [CrudController::class, 'deleteuser'])->name('deleteuser');
	//edit user
	Route::get('user/{id}/edit', [CrudController::class, 'edituser'])->name('edituser');
	//simpan edit user
	Route::patch('user/{id}', [CrudController::class, 'updateuser'])->name('updateuser');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
