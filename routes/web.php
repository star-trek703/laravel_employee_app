<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Employee\RegisteredController as EmployeeRegisteredController;
use App\Http\Controllers\Employee\AuthenticatedSessionController as EmployeeAuthenticatedSessionController;

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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->middleware('auth')->name('edit-profile');
Route::patch('/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('auth')->name('profile.destroy');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');

Route::prefix('employees')->name('employees.')->group(function () {
    Route::get('dashboard', EmployeeDashboardController::class)->middleware('auth')->name('dashboard');
    Route::get('login', [EmployeeAuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');
    Route::post('login', [EmployeeAuthenticatedSessionController::class, 'store'])->middleware('guest');
    Route::get('register', [EmployeeRegisteredController::class, 'create'])->middleware('guest')->name('register');
    Route::post('register', [EmployeeRegisteredController::class, 'store'])->middleware('guest');
});
