<?php

namespace Tests\Feature\MyTeam;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RosterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_roster_returns_when_valid()
    {
        $this->seedDb();
        $this->loginAsUser();

        // add 5th member to roster
        $this->post('/my-team/roster/add-or-remove', [
            'id' => 7592
        ]);

        $response = $this->get('/my-team/roster');
        $response->assertOk();

        $roster = $response->decodeResponseJson();
        $this->assertEquals(count($roster['roster']), 5);
    }

    /** @test */
    public function get_roster_catches_when_roster_invalid()
    {
        $this->seedDb();
        $this->loginAsUser();

        $response = $this->get('/my-team/roster');
        $response->assertStatus(400);
        $this->assertEquals($response->getContent(), 'Roster not full');
    }

    /** @test */
    public function get_roster_amount_returns_roster_amount()
    {
        $this->seedDb();
        $this->loginAsUser();

        $response = $this->get('/my-team/roster/amount');
        $response->assertOk();
        $this->assertEquals($response->getContent(), 4);
    }

    /** @test */
    public function can_add_to_roster()
    {
        $this->seedDb();
        $this->loginAsUser();

        $response = $this->get('/my-team/roster/amount');
        $this->assertEquals($response->getContent(), 4);

        // add 5th member to roster
        $this->post('/my-team/roster/add-or-remove', [
            'id' => 7592
        ]);

        $response = $this->get('/my-team/roster/amount');
        $this->assertEquals($response->getContent(), 5);
    }

    /** @test */
    public function cannot_add_when_five_in_roster()
    {
        $this->seedDb();
        $this->loginAsUser();

        // add 5th member to roster
        $this->post('/my-team/roster/add-or-remove', [
            'id' => 7592
        ]);

        // attempting to add 6th member to roster
        $response = $this->post('/my-team/roster/add-or-remove', [
            'id' => 11893
        ]);
        $response->assertStatus(400);
        $this->assertEquals($response->getContent(), 'You already have 5 players in your roster');
    }

    /** @test */
    public function can_remove_to_roster()
    {
        $this->seedDb();
        $this->loginAsUser();

        $response = $this->get('/my-team/roster/amount');
        $this->assertEquals($response->getContent(), 4);

        // remove player from roster
        $response = $this->post('/my-team/roster/add-or-remove', [
            'id' => 7998
        ]);

        $response = $this->get('/my-team/roster/amount');
        $this->assertEquals($response->getContent(), 3);
    }
}
