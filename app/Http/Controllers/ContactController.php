<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'captcha' => ['required', function($attribute, $value, $fail) {
                if (trim($value) !== '5') {
                    $fail('La réponse au champ anti-robot est incorrecte.');
                }
            }],
        ]);

        // Enregistrer le message en base
        \App\Models\ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        // Envoi de l'email (adapter l'adresse destinataire)
        Mail::raw(
            "Message de : {$validated['name']} <{$validated['email']}>

Sujet : {$validated['subject']}

{$validated['message']}",
            function ($mail) use ($validated) {
                $mail->to('contact@mercedes-garage.fr')
                    ->subject('[Contact site] ' . $validated['subject']);
            }
        );

        return redirect()->route('front.thankyou');
    }
} 