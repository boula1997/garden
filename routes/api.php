<?php

use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\CounterController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ServiceController;
use App\Http\Controllers\API\TestimonialController;
use App\Http\Controllers\API\SettingController;
use App\Http\Controllers\API\SliderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('blogs', 'BlogController@index');
// Route::get('blogs/{id}', 'BlogController@show');
// Route::get('testimonials', 'TestimonialController@index');
// Route::get('testimonials/{id}', 'TestimonialController@show');
// Route::get('sliders', 'SliderController@index');
// Route::get('sliders/{id}', 'SliderController@show');
// Route::get('counters', 'CounterController@index');
// Route::get('counter/{id}', 'CounterController@show');
// Route::get('settings', 'SettingController@index');
// Route::get('setting/{id}', 'SettingController@show');
// Route::get('portfolios', 'PortfolioController@index');
// Route::get('portfolio/{id}', 'PortfolioController@show');
// Route::get('pages', 'PageController@index');
// Route::get('page/{id}', 'PageController@show');
// Route::post('store/contact', 'CContactController@store');

Route::group(['middleware' => ['apiLocalization','cors']], function () {
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/service/{id}', [ServiceController::class, 'show']);
    Route::get('/testimonials', [TestimonialController::class, 'index']);
    Route::get('/testimonial/{id}', [TestimonialController::class, 'show']);
    
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blog/{id}', [BlogController::class, 'show']);
    
    Route::get('/sliders', [SliderController::class, 'index']);
    Route::get('/slider/{id}', [SliderController::class, 'show']);
    
    
    Route::get('/counters', [CounterController::class, 'index']);
    Route::get('/counter/{id}', [CounterController::class, 'show']);
    
    Route::get('/settings', [SettingController::class, 'index']);
    
    Route::get('/pages', [PageController::class, 'index']);
    Route::get('/page/{id}', [PageController::class, 'show']);
    
    Route::get('/portfolios', [PortfolioController::class, 'index']);
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show']);


});



Route::post('/contact', [ContactController::class, 'store']);

