<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['link','code'];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function visitors()
    {
      return $this->hasMany(Visitor::class);
    }
}
