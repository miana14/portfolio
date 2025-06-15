<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;


class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $body = "Nouveau message de contact\n\n";
        $body .= "Nom : {$validated['name']}\n";
        $body .= "Email : {$validated['email']}\n";
        $body .= "Sujet : {$validated['subject']}\n\n";
        $body .= "Message :\n{$validated['message']}\n";

        Mail::raw($body, function ($mail) use ($validated) {
            $mail->to('papiont14@gmail.com')
                ->from('papiont14@gmail.com', 'Portfolio - Contact')
                ->replyTo($validated['email'], $validated['name'])
                ->subject('Message de contact de votre Portfolio');
        });

        return redirect()->back()->with('success-contact', 'Votre message a été envoyé avec succès!');
    }
}