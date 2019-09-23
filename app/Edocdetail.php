<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edocdetail extends Model
{
    protected $table = 'edocdetails';

    public function tbedoc(){
        return $this->belongsTo(Edoc::class, 'edoc_id');
    }

}
