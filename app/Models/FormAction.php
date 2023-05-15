<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAction extends Model
{
    use HasFactory;

    protected $table = 'form_actions';
    protected $fillable = [
        'assign_id', 'user_id', 'phase', 'contact_next'
    ];
    protected $dates = ['contact_next'];
}
