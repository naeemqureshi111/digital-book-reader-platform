<?php

namespace App\Models;
use App\Models\Subject;
use App\Models\User;
use App\Models\Admin;
use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Question extends Model
{
    protected $fillable = [
        'question_text', 'option_a', 'option_b', 'option_c', 'option_d','image_photo_url',
        'correct_option', 'classroom_id', 'subject_id','chapter_id', 'user_id', 'admin_id'
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
