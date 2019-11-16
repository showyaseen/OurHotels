<?php
namespace App\OurHotels\Providers\BestHotels;

use App\OurHotels\Contracts\OurHotelsInterface;
use App\OurHotels\DataType\HotelRequest;

class BestHotelProvider implements OurHotelsInterface
{

    public function __construct()
    {
    }

    public function getHotels (HotelRequest $request)
    {
        $hotelCollection  = $this->CallBestHotelAPI(["fromDate"=>$request->from_date, "toDate"=>$request->to_date,
            "city"=>$request->city, "numberOfAdults"=>$request->adults_number]);

        $transformer = new BestHotelTransformer();
        return $transformer->transformCollection($hotelCollection)['data'];
    }

    private function CallBestHotelAPI($data) {
        // dummy data return to simulate calling external best hotel api
        return [
            ["hotel"=>"ABC Hotel", "hotelRate"=>2, "hotelFare"=>"120.01","roomAmenities"=>"aa amenity,bb amenity,vv amenity"],
            ["hotel"=>"XYZ Hotel", "hotelRate"=>3, "hotelFare"=>"200.00","roomAmenities"=>"df amenity,dsd amenity,sdf amenity"],
            ["hotel"=>"HFG Hotel", "hotelRate"=>1, "hotelFare"=>"201.09","roomAmenities"=>"df2 amenity,d1 amenity,s2f amenity"],
            ["hotel"=>"SSR Hotel", "hotelRate"=>2, "hotelFare"=>"900.00","roomAmenities"=>"df2 amenity,dsd2 amenity,sdf2 amenity"],
            ["hotel"=>"NHD Hotel", "hotelRate"=>5, "hotelFare"=>"1000.00","roomAmenities"=>"df1 amenity,ds2d amenity,sdf2 amenity"],
            ["hotel"=>"ADX Hotel", "hotelRate"=>4, "hotelFare"=>"100.00","roomAmenities"=>"df1 amenity,dsd2 amenity,sdf3 amenity"],
            ["hotel"=>"AAA Hotel", "hotelRate"=>4, "hotelFare"=>"1000.00","roomAmenities"=>"df12 amenity,ds2d amenity,sd3f amenity"],
            ["hotel"=>"CCC Hotel", "hotelRate"=>3, "hotelFare"=>"200.00","roomAmenities"=>"df23 amenity,dsd2 amenity,sdf3 amenity"],
            ["hotel"=>"AQQ Hotel", "hotelRate"=>4, "hotelFare"=>"900.00","roomAmenities"=>"df23 amenity,dsd2 amenity,sdf3 amenity"],
        ];
    }

}
