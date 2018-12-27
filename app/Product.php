<?php

namespace Propo;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded= [];

    public function proposals(){

        return $this->belongsToMany(Proposal::class)->using(ProposalProduct::class);

    }
}
