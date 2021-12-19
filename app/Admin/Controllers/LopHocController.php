<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Exports\CauHoiExport;
use App\Admin\Extensions\Exports\LopHocExport;
use App\Models\CauHoi;
use App\Models\DeThi;
use App\Models\LopHoc;
use App\User;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class LopHocController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'LopHoc';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new LopHoc());

        $grid->column('id', __('ID'));
        $grid->column('TenLop', __('Tên lớp'));
        $grid->column('TenHocPhan', __('Tên học phần'));
        $grid->column('MaHocPhan', __('Mã học phần'));
        $grid->column('MoTa', __('Mô tả'));
        $grid->column('deThii.TenDeThi', __('Đề thi'));

        $grid->column('sinhVien', 'Sinh viên')->display(function ($sinhvien) {
            return count($sinhvien);
        })->modal('Tất cả sinh viên của lớp học', function ($model) {

            $comments = $model->sinhVien()->get()->map(function ($comment) {
                return [
                    'masv' => $comment->masv,
                    'name' => $comment->name,
                    'diem_so' => $comment->history->diem_so ?? 'chưa có điểm',
                    'created_at' => $comment->created_at,
                ];
            });

            return new Table(['Mã sinh viên', 'Tên sinh viên', 'Điểm', 'Ngày tạo'], $comments->toArray());
        });

        $grid->column('NgayThi', __('Ngày thi'))->display(function ($create_at) {
            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
        });

//        $grid->column('created_at', __('Ngày cập nhật'))->display(function ($create_at){
//            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
//        });
//        $grid->column('updated_at', __('Ngày cập nhật'))->display(function ($create_at){
//            return Carbon::parse($create_at)->format('H:i:s d-m-Y');
//        });
        $grid->exporter(new LopHocExport());

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
        $show = new Show(LopHoc::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('TenLop', __('TenLop'));
        $show->field('TenHocPhan', __('TenHocPhan'));
        $show->field('MaHocPhan', __('MaHocPhan'));
        $show->field('MoTa', __('MoTa'));
        $show->field('name', __('Name'));
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
        $form = new Form(new LopHoc());

        $form->text('TenLop', __('Tên lớp'));
        $form->text('TenHocPhan', __('Tên học phần'));
        $form->text('MaHocPhan', __('Mã học phần'));
        $form->text('MoTa', __('Mô tả'));

        $form->datetime('NgayThi', __('Ngày thi'));

//        $form->select('DeThi')->options(DeThi::all()->pluck('TenDeThi','id'));

        $form->select('DeThi', __('Đề thi'))->options(DeThi::all()->pluck('TenDeThi', 'id'));

        $form->multipleSelect('sinhVien', __('Sinh viên'))->options(User::all()->pluck('masv', 'id'));


        return $form;
    }
}
