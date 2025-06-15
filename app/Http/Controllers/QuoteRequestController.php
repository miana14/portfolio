<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
    public function index()
{
    // Ceci est pour le back office
    $requests = \App\Models\QuoteRequest::with('services')->latest()->get();

    return view('admin.quote-requests.index', compact('requests'));
}

public function showForm()
{
    // Ceci est pour le front (portfolio)
    $services = \App\Models\Service::all();
    return view('quote-request', compact('services'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'message'    => 'nullable|string',
            'services'   => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $total = 0;
        if (!empty($validated['services'])) {
            $services = Service::whereIn('id', $validated['services'])->get();
            $total = $services->sum('price');
        }

        $quoteRequest = QuoteRequest::create([
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'message' => $validated['message'] ?? null,
            'total'   => $total,
        ]);

        if (!empty($validated['services'])) {
            $quoteRequest->services()->attach($validated['services']);
        }

        return redirect()->back()->with('success', 'Votre demande de devis a été envoyée avec succès !');
    }
}
