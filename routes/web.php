<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HomeController::class)->group(function () {
    //Route::get('/','index')->name('index');
    Route::get('/home','home')->name('home')->middleware(['verified']);
    Route::get('/about','about')->name('home.about');
    Route::get('/term-of-use','termOfUse')->name('home.term-of-use');
    Route::get('/contact','contact')->name('home.contact');
    Route::get('/change-language/{language:code}', 'changeLanguage')->name('language.change');
    Route::get('/change-country/{country:code}', 'changeCountry')->name('country.change');
});


Route::controller(UserController::class)->group(function(){
    Route::get('user/profile-edit','profileEdit')->name('user-profile.edit')->middleware(['auth']);
    Route::get('user/password-edit','passwordEdit')->name('user-password.edit')->middleware(['auth']);
    Route::post('user/delete-request','userDeleteRequest')->name('user.delete-request');
    Route::get('user/delete','userDelete')->name('user.delete')->middleware(['password.confirm']);
});
