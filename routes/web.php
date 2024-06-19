<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


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
    return view('welcome');
});

Route::get('/dashboard', [StudentController::class, 'index'])
    ->middleware(['auth', 'handle.roles:admin']) 
    ->name('dashboard');

Route::get('/userdashboard', [StudentController::class, 'userDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('userdashboard');

// Route::get('/students', [StudentController::class, 'index'])->middleware(['auth', 'role:admin'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->middleware(['auth', 'role:admin'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->middleware(['auth', 'role:admin'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->middleware(['auth', 'role:admin'])->name('students.show');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->middleware(['auth', 'role:admin'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->middleware(['auth', 'role:admin'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->middleware(['auth', 'role:admin'])->name('students.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
