<?php

use App\Http\Controllers\{
    ProfileController,EducationController,HomeController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index_q1'])->name('index_q1');
Route::post('/dispatch-task', [HomeController::class, 'dispatchTask'])->name('dispatch.task');


// Route::get('/', [HomeController::class, 'index'])->name('index');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return 'Welcome, ' . auth()->user()->name;
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/education', [EducationController::class, 'index'])->name('education.index');
    Route::get('/education/create', [EducationController::class, 'create'])->name('education.create');
    Route::post('/education', [EducationController::class, 'store'])->name('education.store');
    Route::get('/education/{id}/edit', [EducationController::class, 'edit'])->name('education.edit');
    Route::post('/education/update/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::delete('/education/{id}', [EducationController::class, 'destroy'])->name('education.destroy');
});

require __DIR__.'/auth.php';
