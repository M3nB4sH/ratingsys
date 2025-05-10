<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Include signature handling traits and contracts
use Creagia\LaravelSignPad\Concerns\RequiresSignature;
use Creagia\LaravelSignPad\Contracts\CanBeSigned;
class ManagerSignature extends Model implements CanBeSigned
{
    use RequiresSignature;
    protected $fillable = ['manager_sign','rating_id'];

}
