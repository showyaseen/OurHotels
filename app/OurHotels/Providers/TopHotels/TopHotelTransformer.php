<?php
namespace App\OurHotels\Providers\TopHotels;

use League\Fractal;
use League\Fractal\Manager;

class TopHotelTransformer extends Fractal\TransformerAbstract
{
    public function transformCollection($hotelCollection)
    {
        $fractal = new Manager;
        return $fractal->createData(new Fractal\Resource\Collection($hotelCollection, new TopHotelTransformer))->toArray();
    }

    public function transform($hotel)
    {
        return [
            'provider' => 'Top Hotels',
            'hotelName' => $hotel['hotelName'],
            'rate' => $hotel['rate'],
            'fare' =>  $hotel['price'],
            'amenities' =>  $hotel['roomAmenities'],
        ];
    }
}
