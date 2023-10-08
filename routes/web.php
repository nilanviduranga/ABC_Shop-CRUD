<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, "login"])->name('login');
Route::get('/register', [HomeController::class, "register"])->name('register');
Route::post('/storeRegister',[HomeController::class,'storeRegister'])->name('storeRegister');
Route::post('/checkUser',[HomeController::class,'checkUser'])->name('checkUser');

Route::get('/adminDashboard',[AdminController::class,'index'])->name('adminDashboard');
Route::get('/categoryView',[AdminController::class,'categoryView'])->name('categoryView');
Route::get('/addProduct',[AdminController::class,'addProduct'])->name('addProduct');

Route::post('/storeCategory',[AdminController::class,'storeCategory'])->name('storeCategory');
Route::get('/{task_id}/deleteCategory', [AdminController::class, "deleteCategory"])->name('deleteCategory');
//.......................................................................................................................update_Category
Route::get('/{task_id}/categoryUpdateView', [AdminController::class, "categoryUpdateView"])->name('categoryUpdateView');
Route::post('/UpdateCategory', [AdminController::class, 'UpdateCategory'])->name('UpdateCategory');


Route::post('/storeProduct',[AdminController::class,'storeProduct'])->name('storeProduct');
Route::get('/{task_id}/deleteProduct', [AdminController::class, "deleteProduct"])->name('deleteProduct');
//.......................................................................................................................update_Product
Route::get('/{task_id}/productUpdateView', [AdminController::class, "productUpdateView"])->name('productUpdateView');
Route::post('/UpdateProduct', [AdminController::class, 'UpdateProduct'])->name('UpdateProduct');




//Route::post('/store', [TodoController::class, "store"])->name('todo.store');

