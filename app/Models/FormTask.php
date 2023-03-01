<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTask extends Model
{
    use HasFactory;

    protected $table = 'form_tasks';
    protected $fillable = [
        'assign_id', 'user_id', 'notes', 'follow_up_date'
    ];

    public function assign_task()
    {
        return $this->hasMany(ChwAssign::class, 'assign_id');
    }
}
