<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $table = 'receivers';

    public function tbedoc(){
        return $this->belongsTo(Edoc::class, 'edoc_id');
    }
}
