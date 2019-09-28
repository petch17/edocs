<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edoc extends Model
{
    protected $table = 'edocs';

    public function tbreceivers(){
        return $this->hasMany(Edoc::class);
    }
}
