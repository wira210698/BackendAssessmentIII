<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingTest extends TestCase
{
    /**
     * A basic unit test example.
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
