<?php

namespace App;

use App\Models\History;
use App\Models\LopHoc;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'masv','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPassWordAttribute($password)
    {
        $this->attributes['password'] = bcrypt(($password));
    }

    public function lopHoc()
    {
        return $this->belongsToMany(LopHoc::class, 'lophoc_user', 'user_id', 'lop_hoc_id')->withTimestamps();
    }
    public function history()
    {
        return $this->hasOne(History::class, 'sinh_vien_id')->select('diem_so');
    }
}
