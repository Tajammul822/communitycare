<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmitAnswer extends Model
{
    use HasFactory;

    protected $table = 'form_submit_answers';

    protected $fillable = [
        'form_submit_id', 'question_id', 'answer_id'
    ];
}
