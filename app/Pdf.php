<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
  protected $quarded = [];
  protected $fillable = ['title','pdf','subjectName','year','section','semester','type'];
  public function user(){

    return $this->belongsTo(User::class);
  }
}
