<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['description', 'users_id', 'mapping_id'];

    public function mapping()
    {
        return $this->belongsTo('App\Models\Mapping');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

}
