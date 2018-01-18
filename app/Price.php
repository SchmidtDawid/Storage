<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    protected $fillable = [
        'value'
    ];

    //należy do jednego produktu
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
