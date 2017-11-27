<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
  protected $fillable = ['visitor','location','country','device','link_id','visits','user_id'];

  public function links()
  {
  return $this->belongsTo(Link::class);
  }
}
