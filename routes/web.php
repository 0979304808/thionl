<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
// Front End
Route::group([
    'prefix' => '/',
    'namespace' => 'FrontEnd'
], function (){
    Route::get('/', 'HomeController@index')->name('frontend.home');
    Route::get('/login', 'AuthController@login')->name('frontend.login');
    Route::post('/login', 'AuthController@loginStore')->name('frontend.login.store');
    Route::get('/register', 'AuthController@register')->name('frontend.register');
    Route::post('/register', 'AuthController@registerStore')->name('frontend.register.store');
    Route::get('/logout', 'AuthController@logout')->name('frontend.logout');
    Route::get('/gioi-thieu', 'HomeController@gioithieu')->name('frontend.gioithieu');
    Route::get('/lop-hoc', 'HomeController@lophoc')->name('frontend.lophoc');
    Route::get('/dang-ky-lop-hoc/{id}', 'HomeController@dangkylophoc')->name('frontend.dangkylophoc');
    Route::get('/huy-lop-hoc/{id}', 'HomeController@huylophoc')->name('frontend.huylophoc');
    Route::get('/bai-thi', 'HomeController@baithi')->name('frontend.baithi');
    Route::get('/tai-khoan', 'HomeController@profile')->name('frontend.profile');
    Route::get('/lam-bai-thi/{id_lophoc}/{id_dethi}', 'HomeController@lambaithi')->name('frontend.lambaithi');
    Route::post('/nop-bai', 'HomeController@nopbai')->name('frontend.nopbai');
});


// Back End
