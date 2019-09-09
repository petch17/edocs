<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    protected $table = 'imgs';

    public function tbedocs(){
        return $this->belongsTo(Edoc::class, 'edoc_id');
    }
}
