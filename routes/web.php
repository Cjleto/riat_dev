<?php

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
    /*return view('welcome');*/
    return redirect()->route('home');
})->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    /*Route::view('about', 'about')->name('about');*/

    Route::resource('clienti', \App\Http\Controllers\ClientiController::class)->parameters([
        'clienti' => 'cliente'
    ]);

    Route::resource('modelli', \App\Http\Controllers\ModelliController::class)->parameters([
        'modelli' => 'modello'
    ]);

    Route::resource('moduli', \App\Http\Controllers\ModuliController::class)->parameters([
        'moduli' => 'modulo'
    ])->only(['index','show','destroy']);

    Route::get('nuovo_modulo', [\App\Http\Controllers\ModuliController::class, 'nuovo'])->name('nuovo_modulo');
    Route::post('genera_modulo', [\App\Http\Controllers\ModuliController::class, 'genera'])->name('genera_modulo');
    Route::post('salva_modulo_compilato', [\App\Http\Controllers\ModuliController::class, 'salva_modulo_compilato'])->name('salva_modulo_compilato');

    Route::post('create-pdf-file', [\App\Http\Controllers\ModuliController::class, 'pdf'])->name('create-pdf-file');
    Route::get('view-pdf-file', [\App\Http\Controllers\ModuliController::class, 'view_pdf'])->name('view-pdf-file');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


    Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');
        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionsController::class);
        Route::resource('roles', \App\Http\Controllers\Admin\RolesController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UsersController::class);
    });
