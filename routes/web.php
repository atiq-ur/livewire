<?php

use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/comments', function () {
    return view('comments');
});*/

Route::get('/', \App\Http\Livewire\Home::class);
Route::get('/login', \App\Http\Livewire\Login::class);

