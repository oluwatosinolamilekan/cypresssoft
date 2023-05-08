<?php

namespace App\Actions\Activity;

use Exception;
use Carbon\Carbon;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CreateActivity
{
    public function run($request)
    {
        DB::beginTransaction();

        $count = Activity::where('date', Carbon::parse($request['date']))->count(); //check the date format..
        if ($count >= 4) {
            throw new Exception('You have reached the maximum number of activities for this day.');
        }
        $reference = Str::random(10);

        if ($request['user_id']) {
            Activity::create([
                'reference' => $reference,
                'creator_id' => Auth::id(),
                'user_id' => $request['user_id'],
                'description' => $request['description'],
                'description' => $request['date'],
                'image' =>  $request['image'],
            ]);
        } else {

            //this is when user is not being selected... global...
            $activity_data = [];
            $users = User::all();
            foreach ($users as $user) {
             $activity_data[] = [
                'reference' => $reference,
                'creator_id' => Auth::id(),
                'user_id' => $user->user_id,
                'description' => $request['description'],
                'description' => $request['date'],
                'image' =>  $request['image'],
             ];
            }
            Activity::insert($activity_data);
        }
        DB::commit();
        return $activity;
    }
}
