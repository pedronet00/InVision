<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/', [ProjectController::class, 'index'])->middleware('auth');

Route::get('/project/create', [ProjectController::class, 'create'])->middleware('auth');

Route::get('/project/list', [ProjectController::class, 'projectList'])->middleware('auth');

Route::get('/project/{id}', [ProjectController::class, 'show'])->middleware('auth');

Route::post('/project', [ProjectController::class, 'store'])->middleware('auth');

Route::post('/project/{id}/task', [TaskController::class, 'store'])->middleware('auth');

Route::get('/swot', function(){ return view('swot.swot');})->middleware('auth');

Route::get('/project/{id}/task/ended', [TaskController::class, 'taskEnded'])->middleware('auth');

Route::get('/project/{id}/task/deleted', [TaskController::class, 'taskDeleted'])->middleware('auth');

Route::get('/project/{id}/deleted', [ProjectController::class, 'projectDeleted'])->middleware('auth');

Route::get('/project/{id}/ended', [ProjectController::class, 'projectEnded'])->middleware('auth');


Route::get('/report', function(){
    return view('report.report');
})->middleware('auth');

Route::get('/profile/show', function(){ 
    return view('profile.show');})->middleware('auth');

Route::get('/auth/register', function(){
    return view('auth.register');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [ProjectController::class, 'index'])->name('dashboard');
});
