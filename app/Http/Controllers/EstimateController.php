<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ServiceController;
use App\Models\Service;



class EstimateController extends Controller
{
    public function calculate(Request $request)
    {
        $serviceIds = $request->input('services', []);
        $services = Service::whereIn('id', $serviceIds)->get();

        return response()->json([
            'total' => $services->sum('price'),
            'services' => $services
        ]);
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'nullable|string',
            'services' => 'required|array',
            'services.*' => 'integer|exists:services,id',
        ]);

        $services = Service::whereIn('id', $validated['services'])->get();
        $total = $services->sum('price');

        // Enregistrement en base
        $quoteRequest = QuoteRequest::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'] ?? '',
            'total' => $total,
        ]);

        $quoteRequest->services()->attach($services->pluck('id'));

        // Envoi de l'email
        // Mail::to('devis@tonsite.com')->send(new QuoteRequestMail(
        //     $validated['name'],
        //     $validated['email'],
        //     $validated['message'] ?? '',
        //     $services,
        //     $total
        // ));

        return response()->json(['message' => 'Demande de devis enregistrée et envoyée avec succès.']);
    }
}



