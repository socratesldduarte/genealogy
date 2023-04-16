<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{WelcomeController, Dashboard, FamilyController, PersonController};

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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/myfamily', [FamilyController::class, 'myfamily'])->name('myfamily');
Route::get('/myfamily/{person}', [FamilyController::class, 'person'])->name('person');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::resource('families', FamilyController::class);
    Route::resource('people', PersonController::class);
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
});

Route::get('/{family}', [WelcomeController::class, 'index']);
