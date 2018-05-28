<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function where($string, $post_id)
    {
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
