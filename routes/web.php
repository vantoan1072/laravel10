<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboadController;
use App\Http\Middleware\CheckLogoutAdmin;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfMethodNotAllowed;
use App\Models\Employees;
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
    return view('index');
});

route::get('/sadmin', [AdminController::class,'admin'])->name('auth.admin');
route::post('/login', [AdminController::class,'login'])->name('auth.login')->middleware(RedirectIfMethodNotAllowed::class);
route::Get('/login', [AdminController::class,'admin'])->name('auth.admin');

route::get('/dashboad/index', [DashboadController::class,'index'])->name('dashboad.index')->middleware(CheckLogoutAdmin::class);

Route::get('/logout', [AdminController::class,'logout'])->name('auth.logout');

/* User */
route::get('/user/index', [UserController::class,'index'])->name('user.index')->middleware(CheckLogoutAdmin::class);
route::get('/user/form-add', [UserController::class,'form_add'])->name('user.form_add');
route::post('/user/add', [UserController::class,'addUsers'])->name('user.add')->middleware(CheckLogoutAdmin::class);
route::get('/user/edit/{id}', [UserController::class,'edit'])->name('user.edit')->middleware(CheckLogoutAdmin::class);
route::post('/user/update/{id}', [UserController::class,'update'])->name('user.update')->middleware(CheckLogoutAdmin::class);
route::get('/user/delete/{id}', [UserController::class,'delete'])->name('user.delete')->middleware(CheckLogoutAdmin::class);
// route::get('/user/search', [UserController::class,'search'])->name('user.search')->middleware(CheckLogoutAdmin::class);


