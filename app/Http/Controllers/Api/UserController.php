<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use App\Libraries\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(!Auth::attempt($credentials)) {
            return $this->invalidCredentials();
        }
        $user = $request->user();
        return $this->returnToken($user, $request);
    }

    public function register(CreateUserRequest $request)
    {
        DB::transaction(function() use($request, &$user) {
            //create a new user
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->remember_token = Utilities::generateToken();
            $user->save();

        });
        return new UserResource($user);
    }

     /**
     * @return JsonResponse
     */
    private function invalidCredentials()
    {
        return response()->json([
            'status' => 'error',
            'message' => 'email and or pasword does not match'
        ], 401);
    }
}
