<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['street', 'number', 'district', 'city', 'state'];

    protected $table = 'address';
    
    public function mapping()
    {
        return $this->hasOne('App\Models\Address', 'address_id');
    }

    public function locale()
    {
        return $this->belongsTo('App\Models\Locale');
    }
}
