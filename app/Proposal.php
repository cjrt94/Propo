<?php

namespace Propo;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $guarded= [];

    public function products(){
        return $this->belongsToMany(Product::class)->using(ProposalProduct::class)->withPivot('price', 'quantity','warranty','term');;

    }

    public function client(){
        return $this->belongsTo('Propo\Client');

    }

    public function contact(){
        return $this->belongsTo('Propo\Contact');

    }

    public function address(){
        return $this->belongsTo('Propo\Address');

    }


}
