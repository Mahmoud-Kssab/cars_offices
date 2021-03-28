<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model 
{

    protected $table = 'drivers';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'type_id', 'activate', 'office_id','car_name','plate');

    public function tripe()
    {
        return $this->belongsTo('App\Models\Trip');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

}