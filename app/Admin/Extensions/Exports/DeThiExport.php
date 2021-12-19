<?php

Namespace App\Admin\Extensions\Exports;

Use Encore\Admin\Grid\Exporters\ExcelExporter;

class DeThiExport extends ExcelExporter
{
    protected $fileName = 'De_Thi.xlsx';

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
