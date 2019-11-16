<?php
namespace App\OurHotels\DataType;

class HotelRequest
{
    public $from_date;
    public $to_date;
    public $city;
    public $adults_number;

    public function __construct(Array $data)
    {
        $this->from_date = $data['from_date'];
        $this->to_date = $data['to_date'];
        $this->city = $data['city'];
        $this->adults_number = $data['adults_number'];
    }
}
