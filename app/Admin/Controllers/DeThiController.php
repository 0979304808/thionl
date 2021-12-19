<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tools\ImportDeThi;
use App\Models\CauHoi;
use App\Models\DeThi;
use Carbon\Carbon;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

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


        $grid->column('cauHoi', 'Câu hỏi')->display(function ($cauhoi) {
            return count($cauhoi);
        })->modal('Tất cả các câu hỏi', function ($model) {

            $comments = $model->cauHoi()->get()->map(function ($comment) {
                return $comment->only(['id', 'CauHoi', 'A', 'B', 'C', 'D', 'E', 'F', 'DapAn', 'created_at']);
            });

            return new Table(['ID', 'Câu hỏi', 'A', 'B', 'C', 'D', 'E', 'F', 'Đáp án đúng', 'Ngày tạo'], $comments->toArray());
        });


        $grid->column('created_at', __('Ngày tạo'))->display(function ($create_at) {
            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
        });
        $grid->column('updated_at', __('Ngày cập nhật'))->display(function ($create_at) {
            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
        });

        $grid->tools(function ($tools) {
            $tools->append(new ImportDeThi());
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

    protected function import(Content $content, Request $request)
    {
        $file = $request->file('file');

        $csv = array_map('str_getcsv', file($file));

        if ($csv[0]) {
            $de_thi = array_search('Đề thi', $csv[0]);
            $cau_hoi = array_search('Câu hỏi', $csv[0]);
            $a = array_search('A', $csv[0]);
            $b = array_search('B', $csv[0]);
            $c = array_search('C', $csv[0]);
            $d = array_search('D', $csv[0]);
            $e = array_search('E', $csv[0]);
            $f = array_search('F', $csv[0]);
            $dap_an_dung = array_search('Đáp án', $csv[0]);
            $dethi_id = 0;
            $cauhoi_id = 0;
            $dethi_name = '' ;
            $i = 0;
            foreach ($csv as $key => $value) {
                if ($key != 0) {
                    $dethi = $value[0];
                    if ($de_thi) {
                        $dethi = $value[$de_thi];
                    }
                    if ($dethi){
                        $i++;
                        $dethi_name = $dethi;
                    }
                    $chech_dt = DeThi::where('TenDeThi', $dethi_name)->first();
                    if ($dethi) {
                        if (!$chech_dt) {
                            $dt = new DeThi();
                            $dt->TenDeThi = $dethi;
                            $dt->save();
                            $dethi_id = $dt->id;
                        }
                    }

                    if ($chech_dt) {
                        $dethi_id = $chech_dt->id;
                    }

                    if ($value[$cau_hoi]) {
                        $check_cauhoi = CauHoi::where('CauHoi', $value[$cau_hoi])->first();
                        if ($check_cauhoi) {
                            $cauhoi_id = $check_cauhoi->id;
                        }else {
                            $ch = new CauHoi();
                            $ch->CauHoi = $value[$cau_hoi];
                            $ch->A = $a ? $value[$a] : null;
                            $ch->B = $b ? $value[$b] : null;
                            $ch->C = $c ? $value[$c] : null;
                            $ch->D = $d ? $value[$d] : null;
                            $ch->E = $e ? $value[$e] : null;
                            $ch->F = $f ? $value[$f] : null;
                            $ch->DapAn = $dap_an_dung ? $value[$dap_an_dung] : null;
                            $ch->save();
                            $cauhoi_id = $ch->id;
                        }
                    }

                    if ($chech_dt){
                        if (!$chech_dt->cauHoi()->where('cau_hoi_id',$cauhoi_id)->exists()){
                            $chech_dt->cauHoi()->attach($cauhoi_id);
                        }
                    }else {
                        if (!$dt->cauHoi()->exists()) {
                            $dt->cauHoi()->attach($cauhoi_id);
                        }
                    }
                }
            }
            return $i;
        }
    }
}
