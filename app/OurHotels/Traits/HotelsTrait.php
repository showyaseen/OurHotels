<?php
namespace App\OurHotels\Traits;

use Illuminate\Support\Arr;

trait HotelsTrait {

    public function sortByRate($hotel){
        return array_values(Arr::sort($hotel, function ($value) {
            return -$value['rate'];
        }));
    }
}

