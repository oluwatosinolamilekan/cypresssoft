<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Actions\Activity\CreateActivity;
use App\Actions\Activity\UpdateActivity;
use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::groupBy('reference', 'id')
        ->paginate(20);
        return view('activities.index',compact('activities'));
    }

    public function create()
    {
        $users = User::get();
        return view('activities.create',compact('users'));
    }

    public function store(CreateActivityRequest $request)
    {
        try{
            (new CreateActivity())->run($request->validated());
            return to_route('activity.index')->with('success', 'Activity Added Succesfully');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($reference, $user_id = null)
    {
      $activity = Activity::where('reference', $reference)->first();
      if(!$activity){
        return to_route('activity.index')->with('error','Activity Not Found');
      }
      $users = User::get();
      return view('activities.edit', compact('activity','users', 'user_id'));
    }

    public function update(UpdateActivityRequest $request, $reference)
    {
        try{
            (new UpdateActivity())->run($request->validated(), $reference);
        return to_route('activity.index')->with('success','Activity Successfully Updated');
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }

    public function delete($reference, $user_id = null)
    {
      try{
        $activity = Activity::filterByRefAndUserid($reference, $user_id ?? false)->get();
        if($activity->count()  == 0){
            return to_route('activity.index')->with('error','Activity Not Found');
        }
      if($user_id){
        $activity->first()->delete();
      }else{
        foreach($activity as $act){
            $act->delete();
        }
      }
      return to_route('activity.index')->with('success','Deleted Successfully');
      }
      catch(Exception $e){
        return back()->with('error',$e->getMessage());
      }
    }

    public function massDelete($reference)
    {
      try{
        $activity = Activity::filterByRefAndUserid($reference)->get();
        if($activity->count()  == 0){
            return to_route('activity.index')->with('error','Activity Not Found');
        }
        foreach($activity as $act){
            $act->delete();
        }
      return to_route('activity.index')->with('success','Deleted Successfully');
      }
      catch(Exception $e){
        return back()->with('error',$e->getMessage());
      }
    }
}
