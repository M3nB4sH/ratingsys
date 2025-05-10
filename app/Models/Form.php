<?php

namespace App\Models;

use App\Enums\Formtype;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name','type', 'options', 'is_deleted'];

    protected function casts(): array
    {
        return [
            'type' => Formtype::class,
        ];
    }
}
