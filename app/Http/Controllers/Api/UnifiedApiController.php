<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\JsonResponse;

class UnifiedApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'projects' => Project::all(),
            'services' => Service::all(),
        ]);
    }
}
