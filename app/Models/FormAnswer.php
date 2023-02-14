<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class FormAnswer extends Model
{
    use HasFactory;

    protected $table = 'form_answers';
    protected $fillable = [
        'form_id', 'answer_id'
    ];

    public function answer_data()
    {
        return $this->belongsTo(Answer::class, 'answer_id');
    }
}
