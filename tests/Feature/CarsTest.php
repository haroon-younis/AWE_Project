<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CarsTest extends TestCase
{
    //use RefreshDatabase; // this will drop all tables and delete data in database

    /** @test */
    public function user_can_add_a_new_car()
    {
        $this->actingAs(factory('App\User')->create());

        $this->post('/cars', [
            'make' => 'Audi',
            'model' => 'S6',
            'description' => 'a description'
        ]);

        $this->assertDatabaseHas('cars', [
            'make' => 'Audi',
            'model' => 'S6',
            'description' => 'a description'
        ]);
    }

    /** @test */
    public function only_signed_in_user_can_add_cars()
    {
        $this->post('/cars')->assertRedirect('/login');
    }
}
