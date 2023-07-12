<?php

use App\Http\Controllers\ToDoController;
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

Route::get('/', function () {
    return view('todos');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/todos', ToDoController::class)->middleware(['auth']);
Route::get('/todos/{id}/assign', [ToDoController::class, 'assign_view'])->middleware(['auth']);
Route::post('/todos/{id}/assign', [ToDoController::class, 'assign'])->middleware(['auth'])->name('todos.assign');

require __DIR__.'/auth.php';
