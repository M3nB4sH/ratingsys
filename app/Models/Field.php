<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Field extends Model
{
    protected $fillable = ['name', 'is_deleted'];

    public function competences(): BelongsToMany

    {

        return $this->belongsToMany(Competence::class,'competence_fields');

    }

}
