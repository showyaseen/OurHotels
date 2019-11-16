<?php
namespace App\OurHotels\Providers\TopHotels;

use App\OurHotels\Contracts\OurHotelsInterface;
use App\OurHotels\DataType\HotelRequest;

class TopHotelProvider implements OurHotelsInterface
{

    public function __construct()
    {
    }

    public function getHotels (HotelRequest $request)
    {
        $hotelCollection  = $this->CallBestHotelAPI(["from"=>$request->from_date, "To"=>$request->to_date,
            "city"=>$request->city, "adultsCount"=>$request->adults_number]);

        $transformer = new TopHotelTransformer();
        return $transformer->transformCollection($hotelCollection)['data'];
    }

    private function CallBestHotelAPI($data) {
        // dummy data return to simulate calling external best hotel api
        return [
            ["hotelName"=>"TOP Hotel", "rate"=>2, "price"=>"120.01", "discount"=>"10","roomAmenities"=>["top 1 amenity","top 2 amenity","top 3 amenity"]],
            ["hotelName"=>"df Hotel", "rate"=>4, "price"=>"540.01", "discount"=>"10","roomAmenities"=>["top 1 amenity","top 2 amenity","top 3 amenity"]],
            ["hotelName"=>"CCV Hotel", "rate"=>1, "price"=>"7000.01", "discount"=>"10","roomAmenities"=>["top 1 amenity","top 2 amenity","top 3 amenity"]],
            ["hotelName"=>"SDS Hotel", "rate"=>5, "price"=>"900.01", "discount"=>"10","roomAmenities"=>["top 1 amenity","top 2 amenity","top 3 amenity"]],
            ["hotelName"=>"SWE Hotel", "rate"=>5, "price"=>"720.01", "discount"=>"10","roomAmenities"=>["top 1 amenity","top 2 amenity","top 3 amenity"]],
            ["hotelName"=>"S111 Hotel", "rate"=>3, "price"=>"2220.01", "discount"=>"10","roomAmenities"=>["top 1 amenity","top 2 amenity","top 3 amenity"]],
        ];
    }

}
