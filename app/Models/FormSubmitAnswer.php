<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmitAnswer extends Model
{
    use HasFactory;

    public $table = 'form_submit_answers';

    protected $fillable = [
        'form_submit_id', 'question_id', 'answer_id'
    ];

    public function submit_question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function submit_answer()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }
}
