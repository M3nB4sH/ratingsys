<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    protected $fillable = ['name','grade', 'is_deleted'];
    public function competences(): BelongsToMany

    {

        return $this->belongsToMany(Competence::class,'competence_activities');

    }

}
