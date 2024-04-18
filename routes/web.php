<?php

use App\Http\Controllers\HomeController;
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
