<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = ['evaluation'];

    protected $table = 'evaluation';

    public function mapping()
    {
        return $this->belongsTo('App\Models\Mapping');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
