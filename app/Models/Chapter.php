<?php

namespace App\Models;
use App\Models\Subject;
use App\Models\User;
use App\Models\Admin;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
   protected $fillable = [
        'name', 'classroom_id', 'subject_id', 'user_id', 'admin_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}


