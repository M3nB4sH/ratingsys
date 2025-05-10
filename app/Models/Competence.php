<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competence extends Model
{
    protected $fillable = ['name', 'is_deleted','is_graded'];
    public function fields(): BelongsToMany

    {

        return $this->belongsToMany(Field::class,'competence_fields');

    }

    public function activities(): BelongsToMany

    {

        return $this->belongsToMany(Activity::class,'competence_activities');

    }
}
