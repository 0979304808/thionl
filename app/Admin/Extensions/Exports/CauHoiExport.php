<?php

Namespace App\Admin\Extensions\Exports;

Use Encore\Admin\Grid\Exporters\ExcelExporter;

class CauHoiExport extends ExcelExporter
{
    protected $fileName = 'Cau_Hoi.xlsx';

    protected $columns = [
        'id' => 'ID',
        'CauHoi' => 'Câu hỏi',
        'A' => 'A',
        'B' => 'B',
        'C' => 'C',
        'D' => 'D',
        'E' => 'E',
        'F' => 'F',
        'DapAn' => 'Đáp án',
    ];
}
