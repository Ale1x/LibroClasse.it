<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RegioneController extends Controller
{
    public function index()
    {
        // Unique key for cache
        $cacheKey = "list-of-regions";

        // Retrieve or create the cache item
        $regions = Cache::remember($cacheKey, 600, function () {
            return ['Abruzzo', 'Basilicata', 'Calabria', 'Campania', 'Emilia Romagna', 'Friuli-Venezia G.',
                'Lazio', 'Liguria', 'Lombardia', 'Marche', 'Molise', 'Piemonte',
                'Puglia', 'Sardegna', 'Sicilia', 'Toscana', 'Trentino-Alto Adige',
                'Umbria', 'Valle d\'Aosta', 'Veneto'];
        });

        // Return the view 'region.select' passing the regions to the view
        return view('adozioni.regione.selectRegione', ['regions' => $regions]);
    }
}
