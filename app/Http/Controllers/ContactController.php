<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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

        Mail::to(config('mail.from.address'))
            ->send(new ContactMail($validated));

        return response()->json(['success' => true]);
    }
}
