<?php

namespace Propo;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded= [];


    public function client()
    {
        return $this->belongsTo('Propo\Client');
    }
}
