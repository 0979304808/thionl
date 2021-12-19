<?php

Namespace App\Admin\Extensions\Exports;

Use Encore\Admin\Grid\Exporters\ExcelExporter;

class LopHocExport extends ExcelExporter
{
    protected $fileName = 'Lop_Hoc.xlsx';

    protected $columns = [
        'id' => 'ID',
        'MaHocPhan' => 'Mã học phần',
        'TenLop' => 'Tên lớp',
        'sinhVien' => 'Sinh viên',
        'deThi' => 'Đề thi',
        'NgayThi'=> 'Ngày thi'
    ];
}
