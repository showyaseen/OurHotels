<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OurHotelsAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCallAPIWithoutAuthentication()
    {
        $data = [
            'from_date' => "2019-11-03",
            'to_date' => "2019-12-03",
            'city' => 'AUH',
            'adults_ number' => 10,
        ];

        $response = $this->json('GET', '/api/OurHotels',$data);
        $response->assertStatus(200);
    }


    public function testCallAPIWithoutAPIParameters()
    {
        $data = [
            'api_username' => "our_hotels",
            'api_password' => "123456",];
        $response = $this->json('GET', '/api/OurHotels',$data);
        $response->assertStatus(400);
    }


    public function testGetHotelsFromTwoAPIs()
    {
        $data = [
            'api_username' => "our_hotels",
            'api_password' => "123456",];
        $response = $this->json('GET', '/api/OurHotels',$data);
        $response->assertStatus(400);
    }
}
