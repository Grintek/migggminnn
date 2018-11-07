<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url_mov extends Model
{
    public function vkauth(){
        return $this->belongsTo('App/Vkauth');
    }
}
