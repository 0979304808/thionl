<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('cau-hoi', CauHoiController::class);
    $router->post('/cau-hoi/create', function (){
        dd('a');
    });
    $router->resource('lop-hoc', LopHocController::class);

    $router->resource('de-thi', DeThiController::class);

    $router->resource('sinh-vien', SinhVienController::class);
});
