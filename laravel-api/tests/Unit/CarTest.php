<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Car;

class CarTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_create_car(){
        $response = Car::create([
            'marca'=>"FIAT",
            'modelo'=>"KA",
            'ano'=>"2020"
            ]);
        $this->assertTrue($response->wasRecentlyCreated);
    }
}
