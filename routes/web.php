<?php

use Illuminate\Support\Facades\Route;


Route::get('/',[\App\Http\Controllers\WelcomeController::class,'index'])->name('welcome');
Route::get('/send/mail',function (){
    $meeting =[
        'title' => 'Meeting invitation'
    ];
    \Illuminate\Support\Facades\Mail::to('alisasoli20@gmail.com')->send(new \App\Mail\MeetingMail($meeting));
    echo "Mail has been sent";
});

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
        Route::post('/module/apply/{id}',[\App\Http\Controllers\UserController::class,'moduleApply'])->name('student.module.apply');
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
       Route::get('/meeting/create',[\App\Http\Controllers\InstituteController::class,'createMeeting'])->name('institute.meeting.create');
   });
});

// Admin Routes
Route::post('admin/get/user/data',[\App\Http\Controllers\AdminController::class,'getUserData'])->name('admin.get.user.data');
Route::group(['prefix'=> 'admin', 'middleware' => 'auth' ], function(){
    Route::get('/profile',[\App\Http\Controllers\AdminController::class,'profile'])->name('admin.profile');
    Route::post('/profile',[\App\Http\Controllers\AdminController::class,'updateSettings']);

});

Route::post('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('logout');


