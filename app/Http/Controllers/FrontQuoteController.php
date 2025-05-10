<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontQuoteController extends Controller
{
        public function showForm()
    {
        $services = \App\Models\Service::all();
        return view('quote-request', compact('services'));
    }
}
