<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Francine',
            'email' => 'francinemoraes08@hotmail.com',
            'password' => bcrypt('stark0810'),
            'api_token' => Str::random(60),
        ]);
    }
}
