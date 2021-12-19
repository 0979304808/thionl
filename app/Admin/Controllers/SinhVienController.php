<?php

namespace App\Admin\Controllers;

use App\User;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SinhVienController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sinh viên';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('masv', __('Mã sinh viên'));
        $grid->column('name', __('Tên'));
        $grid->column('email', __('Email'));


        $grid->column('created_at', __('Ngày tạo'))->display(function ($create_at){
            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
        });

        $grid->column('updated_at', __('Ngày cập nhật'))->display(function ($create_at){
            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
        });


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('masv', __('Masv'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->number('masv', __('Mã sinh viên'));
        $form->text('name', __('Tên'));
        $form->email('email', __('Email'));
//        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('Mật khẩu'));
//        $form->text('remember_token', __('Remember token'));
        return $form;
    }
}
