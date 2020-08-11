<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class QuizAnswer extends Model
{
    use HasTimestamps;

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_option_id',
        'quiz_id',
        'user_id'
    ];

    public function quiz_option(){
        return $this->belongsTo(QuizOption::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
