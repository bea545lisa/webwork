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
// daher landen auch /index.php-Aufrufe hier im Catch-all - Query-String separat prüfen.
Route::get('/{any}', function () {
    if (request()->query('option') === 'com_content') {
        abort(410);
    }
    return view('welcome');
})->where('any', '.*');
