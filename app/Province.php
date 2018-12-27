<?php

namespace Propo;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function  districts(){
        return $this->hasMany('Propo\District');

    }
}
