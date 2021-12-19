<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeThi extends Model
{
    public function lopHoc()
    {
        return $this->hasMany(LopHoc::class, 'DeThi');
    }

    public function cauHoi()
    {
        return $this->belongsToMany(CauHoi::class, 'dethi_cauhoi', 'de_thi_id', 'cau_hoi_id')->withTimestamps();
    }
}
