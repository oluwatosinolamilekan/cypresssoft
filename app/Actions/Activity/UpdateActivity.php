<?php

namespace App\Actions\Activity;

use Exception;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class UpdateActivity
{
    public function run($request, $reference)
    {
        $activity = Activity::filterByRefAndUserid($reference, $request['user_id'] ?? false)->get();

        if($activity->count()  == 0) throw new Exception('Activity not found idiot..');
        DB::beginTransaction();

        $creatorId = auth()->id();
        if ($request['user_id']) {
           $updateActivity = Activity::filterByRefAndUserid($reference, $request['user_id'])
            ->first()->update([
                'creator_id' => $creatorId,
                'description' => $request['description'],
                'date' => $request['date'],
                'image' =>  $request['image'],
            ]);
        } else {

            $activity->update([
                'creator_id' => $creatorId,
                'description' => $request['description'],
                'date' => $request['date'],
                'image' =>  $request['image'],
            ]);

        }
        DB::commit();
        return $activity;
    }
}
