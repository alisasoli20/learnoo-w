<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/{page}',\App\Http\Controllers\WelcomeController::class)
        ->name('page')
        ->where('page','partners|contact-us|privacy-policy|security-policy|terms-conditions');

Route::get('/dashboard',[\App\Http\Controllers\WelcomeController::class,'dashboard'])->name('dashboard');

// Student Routes
Route::group(['prefix'=>'student'], function (){
    Route::post('/login',[\App\Http\Controllers\UserController::class,'login'])->name('student.login');
    Route::post('/register',[\App\Http\Controllers\UserController::class,'register'])->name('student.register');
    Route::group(['middleware' => ['auth','student']], function(){
        Route::get('/profile',[\App\Http\Controllers\UserController::class,'profile'])->name('student.profile');
        Route::get('/profile/edit',[\App\Http\Controllers\UserController::class,'editProfile'])->name('student.profile.edit');
        Route::post('/profile/edit',[\App\Http\Controllers\UserController::class,'updateProfile']);
    });
});

// Institute Routes
Route::group(['prefix' => 'institute'], function(){
   Route::get('/',[\App\Http\Controllers\InstituteController::class,'login_register'])->name('institute');
   Route::post('/login',[\App\Http\Controllers\InstituteController::class,'login'])->name('institute.login');
   Route::post('/register',[\App\Http\Controllers\InstituteController::class,'register'])->name('institute.register');
   Route::group(['middleware' => ['auth','teacher']] , function(){
       Route::post('/module/insert',[\App\Http\Controllers\InstituteController::class,'insertModule'])->name('institute.module.insert');
       Route::get('/profile',[\App\Http\Controllers\InstituteController::class,'profile'])->name('institute.profile');
       Route::get('/profile/edit',[\App\Http\Controllers\InstituteController::class,'editProfile'])->name('institute.profile.edit');
       Route::post('/profile/edit',[\App\Http\Controllers\InstituteController::class,'updateProfile']);
   });
});

Route::post('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');
