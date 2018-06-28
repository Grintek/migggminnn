<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vkauth extends Model
{
    protected $fillable = [
        'access_token',
        'expires_in',
        'user_id',
        'email'
    ];
}
