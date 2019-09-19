<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rcdetail extends Model
{
    protected $table = 'rcdetails';

    public function tbreceiver(){
        return $this->belongsTo(Receiver::class, 'reciver_id');
    }
}
