<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $table = 'objective';

    public function tbedoc(){
        return $this->hasMany(Objective::class);
    }
}
