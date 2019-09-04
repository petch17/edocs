<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $table = 'receivers';

    public function tbedocs(){
        return $this->belongsTo(Edoc::class, 'edoc_id');
    }
}
