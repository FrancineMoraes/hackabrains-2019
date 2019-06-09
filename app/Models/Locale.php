<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = ['latitude', 'longitude'];

    protected $table = 'locale';

    public $timestamps = false;

    public function address()
    {
        return $this->hasOne('App\Models\Address');
    }
}
