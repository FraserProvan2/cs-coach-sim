<?php

namespace Tests\Feature\MyTeam;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTeamSynergyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function perfect_synergy_scored_correctly()
    {
        $this->seedDb();
        $this->artisan('db:seed --class=PerfectSynergySeeder');
        $this->actingAs(User::find(2));

        $response = $this->get('/my-team/synergy');
        $this->assertEquals($response->getContent(), 100);
    }

    /** @test */
    public function synergy_scored_correctly()
    {
        $this->seedDb();
        $this->loginAsUser();

        $response = $this->get('/my-team/synergy');
        $this->assertEquals($response->getContent(), 20);

        // swap player
        $this->post('/my-team/roster/add-or-remove', ['id' => 7998]);
        $this->post('/my-team/roster/add-or-remove', ['id' => 8183]);

        $response = $this->get('/my-team/synergy');
        $this->assertEquals($response->getContent(), 60);
    }
}
