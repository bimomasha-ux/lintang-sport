<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServiceController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::view('/', 'home');
Route::view('/tentang', 'tentang');
Route::view('/layanan', 'layanan');
Route::view('/kontak', 'kontak');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (BREEZE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard-admin', [DashboardController::class, 'admin'])
        ->name('dashboard.admin');

    Route::get('/dashboard-pelanggan', [DashboardController::class, 'user'])
        ->name('dashboard.pelanggan');


    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profil', [ProfileController::class, 'index'])
        ->name('profil.index');

    Route::get('/profil/edit', [ProfileController::class, 'edit'])
        ->name('profil.edit');

    Route::put('/profil', [ProfileController::class, 'update'])
        ->name('profil.update');

    Route::delete('/profil', [ProfileController::class, 'destroy'])
        ->name('profil.destroy');


    /*
    |--------------------------------------------------------------------------
    | BOOKING USER
    |--------------------------------------------------------------------------
    */

    Route::get('/booking-user', [BookingController::class, 'createUser'])
        ->name('booking.user');

    Route::post('/booking-user', [BookingController::class, 'storeUser'])
        ->name('booking.user.store');

    Route::get('/cek-booking/{tanggal}', [BookingController::class, 'cekBooking'])
        ->name('cek.booking');


    /*
    |--------------------------------------------------------------------------
    | BOOKING ADMIN
    |--------------------------------------------------------------------------
    */

    Route::resource('bookings', BookingController::class);

    Route::put('/booking-status/{id}', [BookingController::class, 'updateStatus'])
        ->name('booking.status');


    /*
    |--------------------------------------------------------------------------
    | MASTER DATA
    |--------------------------------------------------------------------------
    */

    Route::resource('services', ServiceController::class);

    Route::resource('patients', PatientController::class);


    /*
    |--------------------------------------------------------------------------
    | LAPORAN & HISTORY
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan', [BookingController::class, 'laporan'])
        ->name('laporan');

    Route::get('/history', [BookingController::class, 'history'])
        ->name('history');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN EXPORT EXCEL
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan/export-excel', [BookingController::class, 'exportExcel'])
        ->name('laporan.export.excel');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT TEST
    |--------------------------------------------------------------------------
    */

    Route::get('/logout-test', function () {

        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    });

});