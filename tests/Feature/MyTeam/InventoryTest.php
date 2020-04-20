<?php

namespace Tests\Feature\MyTeam;

use App\InventoryItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InventoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function my_team_page_can_be_accessed()
    {
        $this->seedDb();
        $this->loginAsUser();
        
        $this->get('/my-team')
            ->assertOk();
    }
    
    /** @test */
    public function get_inventory_returns_inventory()
    {
        $this->seedDb();
        $this->loginAsUser();

        $response = $this->get('/my-team/fetch');
        $response->assertOk();

        $data = $response->decodeResponseJson();
        $this->assertEquals(count($data), 10);
    }
}
