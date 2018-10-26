<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function vkauth(){
        return $this->belongsTo('App/Vkauth');
    }
    //
}
