<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\SchoolClass;

class Instruction extends Model
{
    protected $fillable = ['subject_id', 'class_id', 'content'];

    // Relationship to Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Relationship to Class
    public function class()
    {
        return $this->belongsTo(SchoolClass::class); // Adjust if your class model is named differently
    }
}
