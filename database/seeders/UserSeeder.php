<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usersTest =  [
            [
                'name' => 'Admin',
                'email' => 'admin@test.fr',
                'email_verified_at' => now(),
                'password' => bcrypt('anya'), // password
                'status_id' => 3,
                'remember_token' => Str::random(10),
                ],
            [
                'name' => 'Premium',
                'email' => 'premium@test.fr',
                'email_verified_at' => now(),
                'password' => bcrypt('anya'), // password
                'status_id' => 2,
                'remember_token' => Str::random(10)
            ],
            [
                'name' => 'Regular',
                'email' => 'regular@test.fr',
                'email_verified_at' => now(),
                'password' => bcrypt('anya'), // password
                'status_id' => 1,
                'remember_token' => Str::random(10)
            ]
        ];

        foreach ($usersTest as $user) {
            User::create($user);
        }

    }
}
