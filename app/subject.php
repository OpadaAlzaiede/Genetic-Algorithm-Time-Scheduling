<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
