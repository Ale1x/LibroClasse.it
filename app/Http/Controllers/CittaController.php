<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scuola;
use Illuminate\Support\Facades\Cache;

class CittaController extends Controller
{
    public function index($province)
    {
        // Create a unique cache key based on the province
        $cacheKey = "cities-for-province:{$province}";

        // Retrieve or create the cache item
        $cities = Cache::remember($cacheKey, 600, function () use ($province) {
            return Scuola::where('PROVINCIA', $province)
                ->distinct('DESCRIZIONECOMUNE')
                ->pluck('DESCRIZIONECOMUNE');
        });

        if ($cities->isEmpty()) {
            abort(404, 'Città non trovata');
        }

        return view('adozioni.citta.selectCitta', ['cities' => $cities]);
    }
}
