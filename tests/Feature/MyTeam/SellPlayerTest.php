<?php

namespace Tests\Feature\MyTeam;

use App\InventoryItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class SellPlayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function player_can_be_sold()
    {
        $this->seedDb();
        $this->loginAsUser();

        $this->post('/my-team/sell-player', [
            'id' => 1
        ]);

        $item = InventoryItem::find(1);
        $this->assertEquals(null, $item);
    }

    /** @test */
    public function token_amount_updates_correctly_with_expected_rate()
    {
        $this->seedDb();
        $this->loginAsUser();

        $this->post('/my-team/sell-player', [
            'id' => 1
        ]);

        $this->assertEquals(Auth::user()->tokens, 2062.0);
    }
}
