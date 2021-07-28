<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $quarded = [];
    protected $fillable = ['name','year','semester','section'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
