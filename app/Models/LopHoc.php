<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    public function sinhVien()
    {
        return $this->belongsToMany(User::class, 'lophoc_user', 'lop_hoc_id', 'user_id')->withTimestamps();
    }

    public function deThii()
    {
        return $this->belongsTo(DeThi::class,'DeThi');
    }

}
