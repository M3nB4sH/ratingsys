<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $fillable = ['name', 'is_deleted', 'grade','is_graded'];
}
