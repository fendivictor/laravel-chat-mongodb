<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Amar The Friend',
            'email' => 'atf@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => \Hash::make('Password123*')
        ]);

        User::create([
            'name' => 'King Sumail',
            'email' => 'sumail@gmail.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password' => \Hash::make('Password123*')
        ]);
    }
}
