<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\ContactConfirmMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|max:2000',
        ]);

        // Honeypot-Check
        if ($request->input('honeypot')) {
            return response()->json(['success' => true]);
        }

        try {
            // Mail an Beate
            Mail::to(config('mail.from.address'))
                ->send(new ContactMail($validated));
            // Bestätigung an Kunden
            Mail::to($validated['email'])
                ->send(new ContactConfirmMail($validated));
        } catch (\Exception $e) {
            Log::error('Kontaktformular Mail-Fehler: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Mail konnte nicht gesendet werden.'], 500);
        }

        return response()->json(['success' => true]);
    }
}
