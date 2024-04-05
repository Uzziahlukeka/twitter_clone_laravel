<?php

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
Route::post('/idea', [IdeaController::class,'store'])->name('idea.create');
Route::get('/idea/{id}', [IdeaController::class,'show'])->name('idea.show');
Route::get('/idea/{id}/edit', [IdeaController::class,'edit'])->name('idea.edit');
Route::put('/idea/{id}', [IdeaController::class,'update'])->name('idea.update');
Route::delete('/idea/{id}', [IdeaController::class,'destroy'])->name('idea.destroy');
Route::post('/idea/{id}/comments', [CommentController::class,'store'])->name('idea.comment.store');


Route::get('/terms', function () {
    return view('terms');
});
