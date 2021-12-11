<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    public function deThi()
    {
        return $this->belongsToMany(DeThi::class, 'dethi_lophoc', 'cau_hoi_id', 'de_thi_id')->withTimestamps();
    }

    public function cauTraLoi()
    {
        return $this->hasMany(CauHoi::class, 'dethi_lophoc', 'cau_hoi_id');
    }

}
