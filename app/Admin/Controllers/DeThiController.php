<?php

namespace App\Admin\Controllers;

use App\Models\CauHoi;
use App\Models\DeThi;
use Carbon\Carbon;
Use Encore\Admin\Widgets\Table;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DeThiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'DeThi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new DeThi());

        $grid->column('id', __('Id'));
        $grid->column('TenDeThi', __('Tên đề thi'));
//        $grid->column('cauHoi', __('Câu hỏi'))->display(function ($cauhoi){
//            return "<a class='label label-success'>Xem chi tiết (".count($cauhoi).") </a>";
//        })->action(\App\Admin\Actions\DeThi\CauHoi::class);


        $grid->column('cauHoi', 'Câu hỏi')->display(function ($cauhoi){
            return count($cauhoi);
        })->modal('Tất cả các câu hỏi', function ($model) {

            $comments = $model->cauHoi()->get()->map(function ($comment) {
                return $comment->only(['id', 'CauHoi', 'DapAn','created_at']);
            });

            return new Table(['ID','Câu hỏi', 'Đáp án đúng','Ngày tạo'], $comments->toArray());
        });



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
        $show = new Show(DeThi::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('TenDeThi', __('Tên đề thi'));
        $show->field('created_at', __('Ngày tạo'));
        $show->field('updated_at', __('Ngày cập nhật'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DeThi());

        $form->text('TenDeThi', __('Tên đề thi'));
        $form->multipleSelect('CauHoi', __('Câu hỏi'))->options(CauHoi::all()->pluck('CauHoi', 'id'));

        return $form;
    }
}
