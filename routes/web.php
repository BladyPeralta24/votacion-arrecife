<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');


?>
