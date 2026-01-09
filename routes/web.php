<?php
use App\Http\Controllers\LeverancierController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/leveranciers', [LeverancierController::class, 'index'])
->name('leveranciers.index');

Route::get('/leverancier/{id}', [LeverancierController::class, 'show'])
->name('leverancier.show');