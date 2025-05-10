<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['data','user_id','teacher_id','form_id', 'is_deleted'];
}
