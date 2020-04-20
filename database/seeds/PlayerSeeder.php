<?php

use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed somewhat real data example (over faked)
        $players = [
            ['id' => '7998', 'name' => 's1mple', 'type' => 'normal', 'team' => 'Natus Vincere', 'age' => 22, 'nationality' => 'UA', 'rating' => '1.23', 'headshots' => '42.3%', 'kd_ratio' => '1.31', 'kpr' => '0.85', 'dpr' => '86.3'],
            ['id' => '10394', 'name' => 'Twistzz', 'type' => 'normal', 'team' => 'Liquid', 'age' => 20, 'nationality' => 'CA', 'rating' => '1.13', 'headshots' => '61.4%', 'kd_ratio' => '1.20', 'kpr' => '0.75', 'dpr' => '77.8'],
            ['id' => '9216', 'name' => 'coldzera', 'type' => 'normal', 'team' => 'FaZe', 'age' => 25, 'nationality' => 'BR', 'rating' => '1.19', 'headshots' => '48.4%', 'kd_ratio' => '1.30', 'kpr' => '0.79', 'dpr' => '81.5'],
            ['id' => '3741', 'name' => 'NiKo', 'type' => 'normal', 'team' => 'FaZe', 'age' => 23, 'nationality' => 'BA', 'rating' => '1.16', 'headshots' => '50.3%', 'kd_ratio' => '1.20', 'kpr' => '0.80', 'dpr' => '85.7'],
            ['id' => '7592', 'name' => 'device', 'type' => 'normal', 'team' => 'Astralis', 'age' => 24, 'nationality' => 'DK', 'rating' => '1.17', 'headshots' => '35.0%', 'kd_ratio' => '1.26', 'kpr' => '0.78', 'dpr' => '80.9'],
            ['id' => '11893', 'name' => 'ZywOo', 'type' => 'normal', 'team' => 'Vitality', 'age' => 19, 'nationality' => 'FR', 'rating' => '1.35', 'headshots' => '42.0%', 'kd_ratio' => '1.39', 'kpr' => '0.87', 'dpr' => '90.6'],
            ['id' => '8711', 'name' => 'Sonic', 'type' => 'normal', 'team' => 'Cloud9', 'age' => 21, 'nationality' => 'ZA', 'rating' => '1.13', 'headshots' => '46.0%', 'kd_ratio' => '1.20', 'kpr' => '0.76', 'dpr' => '80.5'],
        ];

        foreach($players as $player) {
            DB::table('players')->insert($player);
        }
    }
}
