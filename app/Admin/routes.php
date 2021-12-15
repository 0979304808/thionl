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
    $router->resource('sinh-vien', SinhVienController::class);
    $router->resource('lop-hoc', LopHocController::class);
    $router->resource('de-thi', DeThiController::class);
    $router->resource('cau-hoi', CauHoiController::class);

    $router->post('cau-hoi/csv/import', 'CauHoiController@import');
    $router->post('de-thi/csv/import', 'DeThiController@import');

});
