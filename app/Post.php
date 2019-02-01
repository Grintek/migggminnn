<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $post_id)
 */
class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Vkauth');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }
}
