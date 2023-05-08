<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * @return JsonResponse
     */
    protected function resourceNotFound(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'resource not found'
        ], 404);
    }

    /**
     * @return JsonResponse
     */
    protected function resourceDeleted()
    {
        return response()->json(['status' => 'success', 'message' => 'resource deleted successfully'], 200);
    }

    /**
     * @return JsonResponse
     */
    protected function returnToken($user, $request = null): JsonResponse
    {
        $tokenResult = $user->createToken('Personal Access Token');

        return response()->json([
            'access_token' => $tokenResult->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

}
