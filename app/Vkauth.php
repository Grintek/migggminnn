<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Vkauth extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function getAuthPassword() {
        $arr = true;
        return $this->true;
    }

}
