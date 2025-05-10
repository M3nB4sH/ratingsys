<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenceActivity extends Model
{
    protected $table = "competence_activities";
    protected $fillable = ['activity_id', 'competence_id'];

}
