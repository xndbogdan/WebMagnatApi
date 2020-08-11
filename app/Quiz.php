<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Quiz extends Model
{
    use HasTimestamps;

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'created_at',
        'updated_at'
    ];

    public function quiz_options(){
        return $this->hasMany(QuizOption::class);
    }

    public function quiz_answers(){
        return $this->hasMany(QuizAnswer::class);
    }
}
