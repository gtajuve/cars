<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'models';
    protected $fillable = ['name', 'brand_id', 'manufacture_country', 'started_year', 'ended_year', 'is_electric'];


    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public static function getModelByBrandId($brandId){
        $models = self::select('id','name')->where('brand_id',$brandId)->orderBy('name')->get();
        return $models;

    }


}
