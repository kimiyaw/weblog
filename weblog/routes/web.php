<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ShowController;
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

Route::get('/posts/{post}',[ShowController::class,'show']);
Route::get('/',[PostController::class,'show']);
Route::get('/adminpanel/categories',[CategoryController::class,'index']);
Route::get('/adminpanel/categories/create',[CategoryController::class,'create']);
Route::post('/adminpanel/categories/store',[CategoryController::class,'store']);
Route::get('/adminpanel/categories/{category}/edit',[CategoryController::class,'edit']);
Route::patch('/adminpanel/categories/{category}',[CategoryController::class,'update']);
Route::delete('/adminpanel/categories/{category}',[CategoryController::class,'destroy']);



Route::get('/adminpanel/posts',[PostController::class,'index']);
Route::get('/adminpanel/posts/create',[PostController::class,'create']);
Route::post('/adminpanel/posts/store',[PostController::class,'store']);
Route::get('/adminpanel/posts/{post}/edit',[PostController::class,'edit']);
Route::patch('/adminpanel/posts/{post}/',[PostController::class,'update']);
Route::delete('/adminpanel/posts/{post}/',[PostController::class,'destroy']);

