<?php
namespace App\Http\Controllers;

use App\OurHotels\DataType\HotelRequest;
use App\OurHotels\Providers\BestHotels\OurHotelsTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\OurHotels\Traits\HotelsTrait;

class OurHotelsController {
    use HotelsTrait;
    private $providers = [];
    private $hotels = [];

    public function __construct()
    {
        $hotels_providers = config('hotels.providers');
        // add providers from configuration file
        foreach($hotels_providers as $key=>$provider) {
            $this->providers[$key] = new $provider;
        }
    }

    public function index (Request $request)
    {

        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date_format:Y-m-d',
            'to_date' => 'required|date_format:Y-m-d',
            'city' => 'required|string|min:3|max:3',
            'adults_number' => 'required|integer|digits_between:1,11',
        ],[
            'from_date.*' => __('message.from_date'),
            'to_date.*' => __('message.to_date'),
            'city.*' => __('message.city'),
            'adults_number.*' => __('message.adults_number'),
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => '400', 'errors'=>$validator->errors()], 400);
        }

        $hotel_request = new HotelRequest($request->all());

        foreach($this->providers as $provider) {
            $this->hotels = Arr::collapse([$this->hotels, $provider->getHotels($hotel_request)]);
        }

        $final_response_transformer = new OurHotelsTransformer();
        $sorted_by_rate_hotels = $this->sortByRate($this->hotels);
        return $final_response_transformer->transformCollection($sorted_by_rate_hotels);
    }


}

