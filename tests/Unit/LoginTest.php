<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /** @test */
    public function _user_can_view_a_login_form()
    {
        //$this->withoutExceptionHandling();
        
        $response = $this->get('/login');
        
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }
    
    /** @test */
    public function user_cannot_view_login_form_when_signed_in()
    {
        //$this->withoutExceptionHandling();
        
        $user = factory(User::class)->make();
        
        $response = $this->actingAs($user)->get('/login');
        
        $response->assertRedirect('/home');
    }

}