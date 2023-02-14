<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Question;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
