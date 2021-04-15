<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => env('DEFAULT_USER_NAME', 'Testing Tester'),
            'nickname' => env('DEFAULT_USER_NICKNAME', 'tester'),
            'email' => env('DEFAULT_USER_EMAIL', 'tester@tester.com'),
            'password' => Hash::make(env('DEFAULT_USER_PASSWORD', '12345678')),
        ]);

        User::factory()->count(10)->create();
    }
}
