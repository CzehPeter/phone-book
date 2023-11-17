<?php

use App\Http\Controllers\PhonebookController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect('/phonebook');
});

Route::prefix('phonebook')->group(function () {
    /** Table view */
    Route::get('/', [PhonebookController::class, 'index'])->name('phonebook.index');

    /** Create phonebook row */
    Route::get('/create', [PhonebookController::class, 'create'])
         ->middleware('phoneNumberFormmat')
         ->name('phonebook.create');

    //Route::post('/', [PhonebookController::class, 'store'])->name('phonebook.store');
    //Route::get('/{id}/edit', [PhonebookController::class, 'edit'])->name('phonebook.edit');
    //Route::post('/{id}', [PhonebookController::class, 'update'])->name('phonebook.update');
    //Route::delete('/{id}', [PhonebookController::class, 'destroy'])->name('phonebook.destroy');

    /** Load phonebook content */
    Route::post('/load', [PhonebookController::class, 'load'])->name('phonebook.load');
});



