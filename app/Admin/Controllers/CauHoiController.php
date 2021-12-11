<?php

namespace App\Admin\Controllers;

use App\Models\CauHoi;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class CauHoiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'CauHoi';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CauHoi());

//        $grid->column('id', __('Id'));
        $grid->column('CauHoi', __('Câu hỏi'));

        $grid->column('id', 'Câu trả lời')->display(function (){
            return 'Xem chi tiết';
        })->modal('Các câu trả lời', function ($model) use ($grid){
                $data = [
                    ($model->A ? ['A', $model->A] : null),
                    ($model->B ? ['B', $model->B] : null),
                    ($model->C ? ['C', $model->C] : null),
                    ($model->D ? ['D', $model->D] : null),
                    ($model->E ? ['E', $model->E] : null),
                    ($model->F ? ['F', $model->F] : null),
                ];
                $data = array_filter($data);

                $datas = array_filter($data, function($value) use ($model) { return $value[0] == $model->DapAn ? ($value[2] = "ok") : $value; });


            return new Table(['Đáp án','Nội dung'], $datas);
        });




        $grid->column('DapAn', __('Đáp án đúng'));
        $grid->column('created_at', __('Ngày tạo'))->display(function ($create_at){
            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
        });
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(CauHoi::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('CauHoi', __('Câu hỏi'));
        $show->field('A', __('A'));
        $show->field('B', __('B'));
        $show->field('C', __('C'));
        $show->field('D', __('D'));
        $show->field('E', __('E'));
        $show->field('F', __('F'));
        $show->field('DapAn', __('Đáp án'));
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
        $form = new Form(new CauHoi());
        $form->tab('Nhập sản phẩm', function (Form $form) {
            $form->text('CauHoi', __('Câu hỏi'));

            $form->text('A', __('A'));
            $form->text('B', __('B'));
            $form->text('C', __('C'));
            $form->text('D', __('D'));
            $form->text('E', __('E'));
            $form->text('F', __('F'));

            $form->select('DapAn', __('DapAn'))->options(['A' => 'A','B' =>'B','C' => 'C','D' => 'D','E' => 'E','F' => 'F']);;

        });







        return $form;
    }
}
