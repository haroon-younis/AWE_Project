<?php

namespace Tests\Unit;

use App\Car;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function user_can_have_todo_items_on_cars()
    {
        $car = factory('App\Car')->create();
        
        $car->addTodo('Add Tax');
        
        $this->assertEquals($car, $car->addTodo('Add Tax'));
        
    }
    
    /** @test */
    public function a_user_can_browse_cars()
    {
        $car = factory('App\Car')->create();
        
        $response = $this->get('/cars');
    
        $response->assertSee($car->make);

    }
}
