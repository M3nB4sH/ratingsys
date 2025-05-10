<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenceField extends Model
{
    protected $table = "competence_fields";
    protected $fillable = ['field_id', 'competence_id'];
}
