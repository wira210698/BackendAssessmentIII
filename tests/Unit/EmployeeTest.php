<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;

class EmployeeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $faker = Faker::create('id_ID');

        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $name = $firstName . " " . $lastName;
        $salary = $faker->randomElement([
            2500000,
            3500000,
            4500000,
            5500000,
            6500000,
        ]);
        $data_insert = [
            'name'=>$name,
            'salary'=>$salary
        ];
        $responese = $this->json('post', '/api/employees',$data_insert)
                            ->assertStatus(200);
        $this->assertTrue(true);
    }
}
