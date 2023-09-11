<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/















Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {



        // Route::get('/', function () {
        //     return redirect()->route('admin.login-view');
        // });


        Route::get('/', [HomeController::class, 'index'])->name('front.home');
        Route::get('/blog-page', 'App/Http/Controllers/BlogController@index')->name('front.blog');
        Route::get('/contact', 'App/Http/Controllers/ContactController@index')->name('front.contact');
        Route::get('/service', 'App/Http/Controllers/ServiceController@index')->name('front.service');
        Route::get('/single-service', 'App/Http/Controllers/ServiceController@show')->name('front.show.service');
        Route::get('/testimonial', 'App/Http/Controllers/TestimonialController@index')->name('front.testimonial');
        Route::get('/single-testimonial', 'App/Http/Controllers/TestimonialController@show')->name('front.show.testimonial');
        Route::get('/process', 'App/Http/Controllers/ProcessController@index')->name('front.process');
        Route::get('/single-process', 'App/Http/Controllers/ProcessController@show')->name('front.show.process');
        Route::get('/single-blog', 'App/Http/Controllers/BlogController@show')->name('front.show.blog');
        Route::get('/portfolio', 'App/Http/Controllers/PortfolioController@index')->name('front.portfolio');
        Route::get('/video', 'App/Http/Controllers/VideoController@index')->name('front.video');
        Route::get('/about', 'App/Http/Controllers/AboutController@index')->name('front.about');
        Route::post('/contact', 'App/Http/Controllers/ContactController@store')->name('front.contact.post');

    }
);


