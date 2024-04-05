<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashbordController::class,'index'])->name('dashbord');
Route::get('Dashbord', [DashbordController::class,'index'])->name('dashbord');

Route::group(['prefix'=>'idea/','as'=>'idea.','middleware'=>['auth']],function(){

    Route::post('', [IdeaController::class,'store'])->name('create')->withoutMiddleware(['auth']);
    Route::get('{id}', [IdeaController::class,'show'])->name('show')->withoutMiddleware(['auth']);
    Route::get('/{id}/edit', [IdeaController::class,'edit'])->name('edit');
    Route::put('{id}', [IdeaController::class,'update'])->name('update');
    Route::delete('{id}', [IdeaController::class,'destroy'])->name('destroy');
    Route::post('{id}/comments', [CommentController::class,'store'])->name('comment.store');
    
});

Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'store']);
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'authenticate']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');


Route::get('/terms', function () {
    return view('terms');
});
