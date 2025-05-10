<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class QuoteRequestController extends Controller
{
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
