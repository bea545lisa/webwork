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

        // Spam wird still verworfen (Bot bekommt "Erfolg" und versucht es nicht anders)
        if ($reason = $this->spamReason($request, $validated)) {
            Log::info('Kontaktformular: Spam verworfen (' . $reason . ')', [
                'ip'    => $request->ip(),
                'name'  => $validated['name'],
                'email' => $validated['email'],
            ]);
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

    private function spamReason(Request $request, array $data): ?string
    {
        // Honeypot: für Menschen unsichtbares Feld, Bots füllen es aus
        if ($request->filled('website')) {
            return 'honeypot';
        }

        // Zeitfalle: Menschen brauchen länger als 3 Sekunden zum Ausfüllen,
        // fehlt der Wert, wurde das Formular ohne JS direkt gepostet
        if ((int) $request->input('elapsed', 0) < 3000) {
            return 'zu schnell';
        }

        // Kauderwelsch wie "rvEQPBTpiUONVsEBbEHIDj": Nachricht besteht nur daraus
        // oder ein Wort im Namen sieht so aus
        $nameWords = preg_split('/\s+/', trim($data['name']));
        if ($this->isGibberish($data['message']) || array_filter($nameWords, fn ($w) => $this->isGibberish($w))) {
            return 'kauderwelsch';
        }

        return null;
    }

    private function isGibberish(string $value): bool
    {
        $value = trim($value);

        // Ein einziges langes Wort aus reinen Buchstaben ...
        if (!preg_match('/^[a-zA-Z]{10,}$/', $value)) {
            return false;
        }

        // ... mit vielen Groß-/Kleinbuchstaben-Wechseln mitten im Wort
        return preg_match_all('/[a-z][A-Z]/', $value) >= 3;
    }
}
