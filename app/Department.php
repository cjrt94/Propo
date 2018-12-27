<?php

namespace Propo;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function provinces() {
        return $this->hasMany('Propo\Province');
    }
}
