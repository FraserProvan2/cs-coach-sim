<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_access_landing_area()
    {
        $this->get('/landing')
            ->assertOk();
    }

    /** @test */
    public function guest_cannot_access_main_area()
    {
        $this->get('/')
            ->assertStatus(302);
    }

    /** @test */
    public function user_can_access_main_area()
    {
        $this->seedDb();
        $this->loginAsUser();

        $this->get('/play')
            ->assertOk();
    }

    /** @test */
    public function user_cannot_access_admin_area()
    {
        $this->seedDb();
        $this->loginAsUser();

        $this->get('/admin')
            ->assertStatus(302);
    }

    /** @test */
    public function admin_can_access_main_area()
    {
        $this->seedDb();
        $this->loginAsUser('admin');

        $this->get('/play')
            ->assertOk();
    }

    /** @test */
    public function admin_can_access_admin_area()
    {
        $this->seedDb();
        $this->loginAsUser('admin');

        $this->get('/admin')
            ->assertOk();
    }
}
