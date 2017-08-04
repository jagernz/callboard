<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function author()
    {
        return $this->hasOne('App\User', 'author_name');
    }
}
