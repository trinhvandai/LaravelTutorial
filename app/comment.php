<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function ticket()
    {
    	return $this->belongsTo('App\Ticket');
    }
    protected $guarded=['id'];
}
