<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model 
{

    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function drivers()
    {
        return $this->hasMany('App\Models\Driver');
    }

}