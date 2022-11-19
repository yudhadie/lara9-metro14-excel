<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\Information\ActivityController;
use App\Http\Controllers\Admin\Setting\ExportController;
use App\Http\Controllers\Admin\Setting\ImportController;
use App\Http\Controllers\Admin\UserController;
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
    return view('coming-soon');
})->name('home');

Route::get('/error-admin', function () { return view('errors.admin'); })->name('error.admin');
Route::get('/error-active', function () { return view('errors.active'); })->name('error.active');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified','active'])
    ->prefix('dashboard')
    ->group(function () {

    Route::middleware(['admin'])->group(function () {
        //Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //Setting
            //Import
            Route::get('/setting/import', [ImportController::class, 'index'])->name('import.index');
            Route::post('/setting/import', [ImportController::class, 'user'])->name('import.user');
            //Export
            Route::get('/setting/export', [ExportController::class, 'user'])->name('export.user');
            //User
            Route::resource('/setting/user', UserController::class);
            Route::get('/profile', [UserController::class, 'profile'])->name('profile');
            Route::put('/profile', [UserController::class, 'updateprofile'])->name('profile.update');
            Route::put('/setting/user-reset/{user}', [UserController::class, 'updatepassword'])->name('user.reset');

        //Information
            //Activity
            Route::resource('/information/activity', ActivityController::class);

        //Table
        Route::get('/setting/data/user', [DataController::class, 'datauser'])->name('data.user');
        Route::get('/information/data/activity', [DataController::class, 'dataactivity'])->name('data.activity');
    });

});
