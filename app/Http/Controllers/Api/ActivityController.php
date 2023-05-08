<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use App\Http\Requests\Api\FilterActivity;

class ActivityController extends Controller
{
    public function index(FilterActivity $request)
    {
        $startDate = Carbon::createFromFormat('d/m/Y', $request['start_date']);
        $endDate = Carbon::createFromFormat('d/m/Y', $request['end_date']);

        $activities = Activity::withinDateRange($startDate,$endDate)->paginate(20);
        return  ActivityResource::collection($activities);
    }
}
