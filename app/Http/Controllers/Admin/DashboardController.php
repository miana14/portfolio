<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Service;
use App\Models\QuoteRequest;

class DashboardController extends Controller
{
        public function index()
    {
        return view('admin.dashboard.index', [
            'projectsCount' => Project::count(),
            'servicesCount' => Service::count(),
            'quotesCount' => QuoteRequest::count(),
            'visitorsCount' => 1450, 
        ]);
    }
}
