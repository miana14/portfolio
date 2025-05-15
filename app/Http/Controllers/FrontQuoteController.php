<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;


class FrontQuoteController extends Controller
{
        public function showForm()
    {
        $services = Service::all();
        return view('quote-request', compact('services'));
    }
}
