<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edoc extends Model
{
    protected $table = 'edocs';

    public function tbobjective(){
        return $this->belongsTo(Objective::class, 'objective_id');
    }
}
