<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Subject;
use App\Models\Chapter;
use App\Models\Question;
use Illuminate\Auth\Notifications\ResetPassword;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'mobile',
        'role',
        'subject_id',  // Include foreign key here
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // One subject per user
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
public function questions()
{
    return $this->hasMany(Question::class);
}
public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPassword($token));
}

}
