<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Answer;
use App\Models\Form;
use App\Models\FormQuestion;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = ['question'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
}
