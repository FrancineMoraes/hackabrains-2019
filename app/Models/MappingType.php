<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MappingType extends Model
{
    protected $fillable = ['type'];

    public function mappings()
    {
        return $this->hasMany('App\Models\Mapping', 'mapping_types_id');
    }
}

