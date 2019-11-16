<?php
namespace App\OurHotels\Contracts;

use App\OurHotels\DataType\HotelRequest;

Interface OurHotelsInterface
{
    public function getHotels(HotelRequest $request);
}


