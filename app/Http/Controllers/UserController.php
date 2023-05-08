<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['activities'])->find($id);
        if(is_null($user)){
            return to_route('user.index')->with('error', 'user not found');
        }
        if(count($user->activities) < 1){
            return to_route('user.index')->with('error', 'user has no activity');
        }
        $activities = $user->activities()->paginate(20);
        $activity = $user->activities()->first();
        $reference = $activity->reference;
        return view('users.show', compact('user', 'activities', 'reference'));
    }

    public function logout()
    {
        Auth::logout();
        return to_route('index')->with('success', 'Logout Successfully');
    }
}
