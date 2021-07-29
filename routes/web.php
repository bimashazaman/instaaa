<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use http\Client\Curl\User;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostConroller;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FollowsController;


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


Route::get('/home', [UserController::class,'index']);

Auth::routes();
Route::middleware('auth')->group(function (){



    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/upload', [UserController::class,'UploadAvatar']);
    Route::get('/todos',[TodoController::class, 'index']);
    Route::get('/todos/create',[TodoController::class , 'create'])->name('todo.create');
    Route::get('/todos/{todo}/edit',[TodoController::class , 'edit']);
    Route::post('/todos/create', [TodoController::class,'store']);
    Route::patch('/todos/{todo}/update', [TodoController::class,'update'])->name('todo.update');
    Route::delete('/todos/{todo}/delete', [TodoController::class,'delete'])->name('todo.delete');
    Route::get('/todos/show', [TodoController::class,'show'])->name('todo.show');

    Route::get('/profile/{user}',[ProfileController::class, 'index'])->name('profile.show');
    Route::get('/profile/create/{user}',[ProfileController::class, 'create'])->name('profile.create');
    Route::post('/profile/store',[ProfileController::class, 'store']);
    Route::get('/profile/{user}/edit',[ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}/',[ProfileController::class, 'update'])->name('profile.patch');

    Route::post('/uploadProfile', [ProfileController::class,'UploadAvatar']);


    Route::get('/p', [PostConroller::class, 'create']);
    Route::post('/p/store', [PostConroller::class, 'store']);
    Route::get('/p/{post}',[PostConroller::class, 'show'])->name('profile.show');


    Route::post('follow/{user}', [FollowsController::class,'store']);



    Route::delete('/todos/{todo}/incomplete', [TodoController::class,'incomplete'])->name('todo.incomplete');
    Route::put('/todos/{todo}/complete', [TodoController::class,'complete'])->name('todo.complete');

    Route::post('/uploadImage', [ProfileController::class,'UploadAvatar']);
    Route::resource('services', 'ServiceController');

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
