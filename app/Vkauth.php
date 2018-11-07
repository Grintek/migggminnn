<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vkauth extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
    public function isAdmin(){

        return $this->is_admin;
    }
    public function channel(){
        return $this->hasMany('App/Channel');
    }
    public function url_mov(){
        return $this->hasMany('App/Url_mov');
    }

}
