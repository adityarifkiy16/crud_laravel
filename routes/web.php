<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('auth.login');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('soal', SoalController::class);
    Route::resource('jenis', JenisController::class)->parameters(['jenis' => 'jenis']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    /*----------------------------route pendaftaran-------------------------------------- */
    Route::prefix('pendaftaran')->group(function () {
        Route::get('/', [PendaftaranController::class, 'index']);
        Route::get('/create', [PendaftaranController::class, 'create']);
        Route::post('/store', [PendaftaranController::class, 'store']);
        Route::delete('/destroy/{id}', [PendaftaranController::class, 'destroy']);
    });

    /*--------------------------------route user----------------------------------------- */
    Route::resource('user', UserController::class);


    /**

    * saya comment karena ngebug :V

    */
    
    // /*----------------------------route email verification------------------------------- */
    // Route::prefix('/email')->group(function () {
        
    //     Route::get('/verify', function () {
    //         return view('auth.verify-email');
    //     })->name('verification.notice');

    //     Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    //         $request->fulfill();
    //         return redirect('/dashboard');
    //     })->middleware(['signed'])->name('verification.verify');
    // });
});

// Login route
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
    Route::get('/register', [LoginController::class, 'create'])->name('register');
    Route::post('/store', [LoginController::class, 'store']);
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
});


// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);
