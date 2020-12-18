<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/{page}',\App\Http\Controllers\WelcomeController::class)
        ->name('page')
        ->where('page','partners|contact-us|privacy-policy|security-policy|terms-conditions');

Route::get('/dashboard',[\App\Http\Controllers\WelcomeController::class,'dashboard'])->name('dashboard');

// Student Routes
Route::group(['prefix'=>'student'], function (){
    Route::post('/login',[\App\Http\Controllers\UserController::class,'login'])->name('student.login');
    Route::post('/register',[\App\Http\Controllers\UserController::class,'register'])->name('student.register');
});

// Institute Routes
Route::group(['prefix' => 'institute'], function(){
   Route::get('/',[\App\Http\Controllers\InstituteController::class,'login_register'])->name('institute');
   Route::post('/login',[\App\Http\Controllers\InstituteController::class,'login'])->name('institute.login');
   Route::post('/register',[\App\Http\Controllers\InstituteController::class,'register'])->name('institute.register');
});
