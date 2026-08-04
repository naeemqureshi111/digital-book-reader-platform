<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;
use App\Models\Chapter;
class Subject extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
public function questions()
{
    return $this->hasMany(Question::class);
}
 public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

}
