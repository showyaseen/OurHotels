<?php
namespace App\OurHotels\Providers\BestHotels;

use League\Fractal;
use League\Fractal\Manager;
use App\OurHotels\DataType\HotelResponse;

class OurHotelsTransformer extends Fractal\TransformerAbstract
{
    public function transformCollection($hotelCollection)
    {
        $fractal = new Manager;
        return $fractal->createData(new Fractal\Resource\Collection($hotelCollection, new OurHotelsTransformer))->toArray();
    }

    public function transform($hotel)
    {
        return [
            'provider' => $hotel['provider'],
            'hotelName' => $hotel['hotelName'],
            'fare' =>  $hotel['fare'],
            'rate' =>  $hotel['rate'],
            'amenities' =>  $hotel['amenities'],
        ];
    }
}
