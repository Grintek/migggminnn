<?php

namespace App;// TODO поменять namespase-ы


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'body_a',
        'published_at'
    ];
}
