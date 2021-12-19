<?php

namespace App\Admin\Controllers;

use App\imports\CauHoiImport;
use App\Models\CauHoi;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;
use App\Admin\Extensions\Tools\ImportButton; // Add
use Encore\Admin\Layout\Content; // Add
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
Use App\Admin\Extensions\Exports\CauHoiExport;

// Add


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

        $grid->tools(function ($tools) {
            $tools->append(new ImportButton());
        });


        $grid->exporter(new CauHoiExport());





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
            $form->text('CauHoi', __('Câu hỏi'))->required();

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

    protected function import(Content $content, Request $request)
    {
        $file = $request->file('file');
        $csv = array_map('str_getcsv', file($file));
        if ($csv[0]) {
            $cau_hoi = array_search('Câu hỏi', $csv[0]);
            $a = array_search('A', $csv[0]);
            $b = array_search('B', $csv[0]);
            $c = array_search('C', $csv[0]);
            $d = array_search('D', $csv[0]);
            $e = array_search('E', $csv[0]);
            $f = array_search('F', $csv[0]);
            $dap_an_dung = array_search('Đáp án', $csv[0]);

            foreach ($csv as $key => $value) {
                if ($key != 0) {
                    $cauhoi = $value[0];
                    if ($cau_hoi) {
                        $cauhoi = $value[$cau_hoi];
                    }
                    if ($cauhoi) {
                        if (!CauHoi::where('CauHoi', $cauhoi)->exists()) {
                            $ch = new CauHoi();
                            $ch->CauHoi = $cauhoi;
                            $ch->A = $a ? $value[$a] : null;
                            $ch->B = $b ? $value[$b] : null;
                            $ch->C = $c ? $value[$c] : null;
                            $ch->D = $d ? $value[$d] : null;
                            $ch->E = $e ? $value[$e] : null;
                            $ch->F = $f ? $value[$f] : null;
                            $ch->DapAn = $dap_an_dung ? $value[$dap_an_dung] : null;
                            $ch->save();
                        }
                    }
                }
            }
        }
    }
}
