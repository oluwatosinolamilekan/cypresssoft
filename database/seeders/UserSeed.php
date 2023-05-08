<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total = 100;
        $faker = Factory::create();
        foreach(range(1, $total) as $key => $num){
            $user = new User();
            $user->email = $faker->unique()->safeEmail();
            $user->name = $faker->name;
            $user->role = 2;
            $user->password = \Hash::make('password');
            $user->save();
        }
    }
}
