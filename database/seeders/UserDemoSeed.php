<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserDemoSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'john doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'role' => 2
        ];

        User::create($data);
    }
}
