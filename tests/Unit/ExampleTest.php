<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data_update = [
            'key'=>'123',
            'value'=>1
        ];
        $responese = $this->json('patch', '/api/settings',$data_update)
                            ->assertStatus(200);
        // $this->assertTrue(true);
    }
}
