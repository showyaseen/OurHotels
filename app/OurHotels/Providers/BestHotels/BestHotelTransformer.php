<?php
namespace App\OurHotels\Providers\BestHotels;

use League\Fractal;
use League\Fractal\Manager;

class BestHotelTransformer extends Fractal\TransformerAbstract
{
    public function transformCollection($hotelCollection)
    {
        $fractal = new Manager;
        return $fractal->createData(new Fractal\Resource\Collection($hotelCollection, new BestHotelTransformer))->toArray();
    }

    public function transform($hotel)
    {
        return [
            'provider' => 'Best Hotels',
            'hotelName' => $hotel['hotel'],
            'rate' => $hotel['hotelRate'],
            'fare' =>  $hotel['hotelFare'],
            'amenities' =>  explode(',',$hotel['roomAmenities']),
        ];
    }
}
