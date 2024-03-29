<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ChwAssign extends Model
{
    use HasFactory;


    protected $table = 'chw_assigns';
    protected $fillable = [
        'user_id', 'form_id'
    ];

    public function assign_form()
    {
        return $this->belongsTo(Form::class, 'form_id');
    }

    public function assign_user_data()
    {
        return $this->hasMany(FormSubmit::class, 'form_id');
    }

    public function users_assign()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
