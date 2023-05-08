<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $reference = Str::random(10);
        foreach(range(0, 100) as $num){
            $activity = new Activity();
            $activity->title = $faker->name;
            $activity->description = $faker->text;
            $activity->creator_id = 1;
            $activity->user_id = 1;
            $activity->date = Carbon::now();
            $activity->reference = $reference;
            $activity->save();
        }

    }
}
