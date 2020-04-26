<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerCardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_page_displays_as_expected()
    {
        $this->seedDb();
        $this->loginAsUser('admin');

        $response = $this->get('/admin/players');
        $response->assertOk();
        $response->assertSeeText('Player Cards');
    }

    /** @test */
    public function create_page_displays_as_expected()
    {
        $this->seedDb();
        $this->loginAsUser('admin');

        $response = $this->get('/admin/players/create');
        $response->assertOk();
        $response->assertSeeText('Create Player');
    }

    /** @test */
    public function edit_page_displays_as_expected()
    {
        $this->seedDb();
        $this->loginAsUser('admin');

        $response = $this->get('/admin/players/7998');
        $response->assertOk();
        $response->assertSeeText('s1mple');
    }

    /** @test */
    public function can_create_new_player()
    {
        $this->seedDb();
        $this->loginAsUser('admin');

        $data = [
            'id' => 1,
            'name' => 'krun',
            'type' => 'moments',
            'age' => 24,
            'nationality' => 'GB',
            'rating' => 1,
            'headshots' => 1,
            'kd_ratio' => 1,
            'kpr' => 1,
            'dpr' => 1,
        ];

        $response = $this->post('/admin/players/store', $data);
        unset($data['id']); // to compensate for custom id prefix
        $this->assertDatabaseHas('players', $data);
    }

    /** @test */
    public function can_update_player()
    {
        $this->seedDb();
        $this->loginAsUser('admin');
        
        $data = [
            'id' => 7998,
            'name' => 's1mple',
            'type' => 'normal',
            'age' => 24,
            'nationality' => 'UA',
            'rating' => 1,
            'headshots' => 1,
            'kd_ratio' => 1,
            'kpr' => 1,
            'dpr' => 1,
        ];

        $response = $this->post('/admin/players/' . 7998 . '/update', $data);
        
        $this->assertDatabaseHas('players', $data);
    }
}
