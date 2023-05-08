<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(auth()->check()){
            return \to_route('users.index');
        }
        return view('login');
    }

    public function authenticate(LoginRequest $request)
    {
        try{
            $data = $request->validated();
            if (Auth::attempt($data)) {
                $request->session()->regenerate();

                return \to_route('user.index');
            }else{
                return back()->with('error', 'The provided credentials do not match our records.');
            }
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
