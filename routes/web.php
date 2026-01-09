<?php
use App\Http\Controllers\LeverancierController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/leveranciers', [LeverancierController::class, 'index'])
->name('leveranciers.index');

Route::get('/leverancier/{id}', [LeverancierController::class, 'show'])
->name('leverancier.show');

Route::get('/leverancier/{id}/edit', [LeverancierController::class, 'edit'])
->name('leverancier.edit');