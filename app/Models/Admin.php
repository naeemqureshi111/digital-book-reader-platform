<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;
use App\Models\Question;
use App\Models\Chapter;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable; 
class Admin extends Authenticatable

{
     use Notifiable; //
    protected $guard = 'admin';
    protected $fillable = ['name', 'email','image_photo_url','role'];

      protected $hidden = [
        'password',
        'remember_token',
    ];

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
