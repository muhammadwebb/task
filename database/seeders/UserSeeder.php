<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => '1',
            'name' => 'manager',
            'email' => 'manager@gmail.com',
            'password' => '12345678',
        ]);
    }
}
