<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Form;
use App\Models\Question;
use App\Models\FormAnswer;;

class FormQuestion extends Model
{
    use HasFactory;

    protected $table = 'form_questions';
    protected $fillable = [
        'form_id', 'question_id'
    ];

    public function question_data()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function question_anwser()
    {
        return $this->hasMany(FormAnswer::class, 'form_id', 'question_id');
    }
}
