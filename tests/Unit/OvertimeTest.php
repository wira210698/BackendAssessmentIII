<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;

class OvertimeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $faker = Faker::create('id_ID');

        $date_faker  = $faker->numberBetween(1, 30);
        $time_faker  = $faker->numberBetween(1, 9);
        $time_end_faker  = $faker->numberBetween(10, 24);
        $data_inser = [
            'employee_id'=>'1',
            'date'=>'2020/01/'. $date_faker ,
            'time_started'=>'0'.$time_faker.':00',
            'time_ended'=>$time_end_faker.':00',
        ];
        $responese = $this->json('post', '/api/overtimes',$data_inser)
                            ->assertStatus(200);
        $this->assertTrue(true);
    }
}
