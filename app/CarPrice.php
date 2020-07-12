<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPrice extends Model
{
    protected $table = 'cars_pricelist';
    protected $fillable = ['car_id', 'price'];


    public function car()
    {
        return $this->belongsTo('App\Car');
    }


}
