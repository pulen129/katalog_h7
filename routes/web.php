<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sapa', function () {
    return 'Halo, kelompok 1!';
});


Route::get('/katalog',
    [KatalogController::class, 'index']
)->name('katalog.index');
