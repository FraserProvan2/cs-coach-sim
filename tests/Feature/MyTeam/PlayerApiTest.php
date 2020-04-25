<?php

namespace Tests\Feature\MyTeam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function adds_player_successfully()
    {
        $player_data = [
            'id' => 7998,
            'name' => 's1mple',
            'type' => 'normal',
            'team' => 'Natus Vincere',
            'age' => 22,
            'nationality' => 'UA',
            'rating' => '1.23',
            'headshots' => '42.3%',
            'kd_ratio' => '1.31',
            'kpr' => '0.85',
            'dpr' => '86.3'
        ];

        $result = $this->post('/api/player/add-or-update', $player_data);

        $this->assertEquals("s1mple has been added", $result->getContent());
        $this->assertDatabaseHas('players', $player_data);
    }

    /** @test */
    public function catches_when_attempting_to_add_without_full_data()
    {
        $player_data = [
            'id' => 7998,
            'name' => 's1mple',
        ];

        $result = $this->post('/api/player/add-or-update', $player_data);

        $this->assertEquals(8, count(session('errors'))); // 8 missning fields
        $result->assertStatus(302);
    }

    /** @test */
    public function updates_player_successfully()
    {
        $this->seedDb();

        $player_data = [
            'id' => 7998,
            'name' => 's1mple',
            'type' => 'normal',
            'team' => 'Natus Vincere',
            'age' => 22,
            'nationality' => 'UA',
            'rating' => '1.90',
            'headshots' => '42.3%',
            'kd_ratio' => '1.31',
            'kpr' => '0.85',
            'dpr' => '86.3'
        ];

        $result = $this->post('/api/player/add-or-update', $player_data);

        $this->assertEquals("s1mple has been updated", $result->getContent());
        $this->assertDatabaseHas('players', $player_data);
    }

    /** @test */
    public function catches_when_attempting_to_update_without_full_data()
    {
        $this->seedDb();

        $player_data = [
            'id' => 7998,
            'name' => 's1mple',
        ];

        $result = $this->post('/api/player/add-or-update', $player_data);

        $this->assertEquals(8, count(session('errors'))); // 8 missning fields
        $result->assertStatus(302);
    }
}
