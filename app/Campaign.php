<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
  public function advert()
  {
  return $this->belongsTo(Advert::class);
  }
}
