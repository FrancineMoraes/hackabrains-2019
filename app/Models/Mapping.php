<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{
    protected $fillable = ['address_id', 'users_id', 'mapping_types_id'];
    protected $table = 'mapping';

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address', 'address_id');
    }

    public function mapping_types()
    {
        return $this->belongsTo('App\Models\MappingType', 'mapping_types_id');
    }

    public function mappins()
    {
        return $this->hasMany('App\Models\Mapping');
    }
}
