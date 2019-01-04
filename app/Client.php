<?php

namespace Propo;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded= [];

    public function contacts() {
        return $this->hasMany('Propo\Contact');
    }

    public function addresses() {
        return $this->hasMany('Propo\Address');
    }

}
