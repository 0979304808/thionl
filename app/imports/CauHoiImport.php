<?php

namespace App\imports;

use App\Models\CauHoi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CauHoiImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $ch = new CauHoi();
        $ch->CauHoi = 'abc';
//         new CauHoi([
//            'CauHoi' => $row['cauhoi'],
//            'A' => $row['a'],
//            'B' => $row['b'],
//            'C' => $row['c'],
//            'D' => $row['d'],
//            'F' => $row['e'],
//            'DapAn' => $row['dapan'],
//        ]);
        return $ch->save();
    }
}
