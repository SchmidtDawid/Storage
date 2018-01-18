<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name'
    ];

    public function products(){
        return $this->belongsToMany('App\Products')->withTimestamps();
    }
}
