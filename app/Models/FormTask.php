<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTask extends Model
{
    use HasFactory;

    protected $table = 'form_tasks';
    protected $fillable = [
        'assign_id', 'user_id', 'primary_need', 'first_engage', 'housing', 'family_situation', 'emp_edu', 'barr_con', 'res_ref', 'supp_date'
    ];
    protected $dates = ['first_engage'];

    public function assign_task()
    {
        return $this->hasMany(ChwAssign::class, 'assign_id');
    }
}
