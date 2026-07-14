<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send']);

// Alte Joomla-URLs (Vorgänger-Website): geben absichtlich 410 (dauerhaft entfernt)
// zurück, statt wie der Catch-all unten mit 200 die Startseite auszuliefern.
// Das signalisiert Google klar, diese längst gelöschten Seiten aus dem Index zu nehmen.
Route::get('/component/tags/{any}', function () {
    abort(410);
})->where('any', '.*');

// Laravel entfernt "index.php" schon vor dem Routing aus dem Pfad (Skriptname),
// daher landen auch alle /index.php-Aufrufe (alte Joomla-Website) hier im Catch-all.
Route::get('/{any}', function () {
    if (str_starts_with(request()->getRequestUri(), '/index.php')) {
        abort(410);
    }
    return view('welcome');
})->where('any', '.*');
