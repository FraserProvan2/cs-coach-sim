<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'normal11',
                'email' => 'normal_user@email.com',
                'password' => Hash::make('password'),
                'is_admin' => false
            ],
            [
                'username' => 'admin11',
                'email' => 'admin_user@email.com',
                'password' => Hash::make('password'),
                'is_admin' => true
            ]
            ];

        foreach($users as $user) {
            DB::table('users')->insert($user);
        }
    }
}
