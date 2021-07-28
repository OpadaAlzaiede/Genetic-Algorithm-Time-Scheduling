<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $quarded = [];
  protected $fillable = ['title','description','img','by'];

    public function user(){

      return $this->belongsTo(User::class);
    }
}
