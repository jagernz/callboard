<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function author()
    {
        return $this->belongsTo('App\User','author_name','id');
    }
}
