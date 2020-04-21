<?php

use Illuminate\Database\Seeder;

class PerfectSynergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inventory_items = [
            ['user_id' => 2, 'player_id' => '9216', 'in_team' => 1],
            ['user_id' => 2, 'player_id' => '3741', 'in_team' => 1],
            ['user_id' => 2, 'player_id' => '885', 'in_team' => 1],
            ['user_id' => 2, 'player_id' => '8183', 'in_team' => 1],
            ['user_id' => 2, 'player_id' => '18053', 'in_team' => 1],
            ['user_id' => 2, 'player_id' => '7592'],
        ];
        foreach($inventory_items as $item) {
            DB::table('inventory_items')->insert($item);
        }
    }
}
