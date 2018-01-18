<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'user_id',
    ];

    //ma jednego wprowadzającego użytkownika
    public function user(){
        return $this->belongsTo('App\User');
    }

    //ma wielu dostawców (chwilowo nie działa tak jak zamierzałem)
    public function vendors(){
        return $this->belongsToMany('App\Vendor')->withTimestamps();
    }

    //gnerator listy dostawców dla produktu
    public function getVendorListAttribute(){
        return $this->vendors->pluck('id')->all();
    }

    //ma wiele cen
    public function prices(){
        return $this->hasMany(Price::class);
    }
};
