<?php

use Illuminate\Database\Seeder;

class InventoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventory_items = [
            ['user_id' => 1, 'player_id' => '7998'],
            ['user_id' => 1, 'player_id' => '10394'],
            ['user_id' => 1, 'player_id' => '9216'],
            ['user_id' => 1, 'player_id' => '3741'],
            ['user_id' => 1, 'player_id' => '7592'],
            ['user_id' => 1, 'player_id' => '11893'],
            ['user_id' => 1, 'player_id' => '8711'],
        ];

        foreach($inventory_items as $item) {
            DB::table('inventory_items')->insert($item);
        }
    }
}
