<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scuola;
use Illuminate\Support\Facades\Cache;

class ProvinciaController extends Controller
{
    public function index($region)
    {
        // Create a unique cache key based on the region
        $cacheKey = "provinces-for-region:{$region}";

        // Retrieve or create the cache item
        $provinces = Cache::remember($cacheKey, 600, function () use ($region) {
            return Scuola::where('REGIONE', $region)
                ->distinct('PROVINCIA')
                ->pluck('PROVINCIA');
        });

        if ($provinces->isEmpty()) {
            abort(404, 'Provincia non trovata');
        }

        return view('adozioni.provincia.selectProvincia', ['provinces' => $provinces]);
    }
}
