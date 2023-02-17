<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSubmit extends Model
{
    use HasFactory;
    protected $table = 'form_submit';

    protected $fillable = [
        'form_id', 'first_name', 'last_name', 'email', 'phone', 'zip_code', 'best_describe', 'language', 'help'
    ];
}
