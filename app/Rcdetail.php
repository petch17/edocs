<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rcdetail extends Model
{
    protected $table = 'rcdetail';

    public function tbreceiver(){
        return $this->belongsTo(Receiver::class, 'edoc_id');
    }
}
