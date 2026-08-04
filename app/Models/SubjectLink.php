<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectLink extends Model
{
    protected $fillable = ['subject_id', 'class_id', 'random_code'];
}

