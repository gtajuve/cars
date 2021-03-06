<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['brand_id', 'bodywork_id', 'model_id', 'engine_id', 'price'];


    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function model()
    {
        return $this->belongsTo('App\CarModel');
    }

    public function engine()
    {
        return $this->belongsTo('App\Engine');
    }

    public function bodywork()
    {
        return $this->belongsTo('App\Bodywork');
    }


    public static function searchByRequest($request){

        $search = [];

        if ($request->get('brand')){
            $search['brand_id']= $request->get('brand');
        }
        if ($request->get('model')){
            $search['model_id']= $request->get('model');
        }
        if ($request->get('engine')){
            $search['engine_id']= $request->get('engine');
        }
        if ($request->get('bodywork')){
            $search['bodywork_id']= $request->get('bodywork');
        }
        $minPrice = \Request::get('minPrice');
        $maxPrice = \Request::get('maxPrice');

        $result = self::where($search)->whereBetween("price",[$minPrice, $maxPrice])->count();

        return $result;

    }
}
