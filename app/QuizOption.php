<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class QuizOption extends Model
{
    use HasTimestamps;

    protected $appends = ['answers_count'];

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
        'created_at',
        'updated_at'
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function getAnswersCountAttribute(){
        return QuizAnswer::where('quiz_option_id', $this->id)->count();
    }
}
