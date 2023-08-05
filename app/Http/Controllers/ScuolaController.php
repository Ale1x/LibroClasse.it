<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scuola;
use Illuminate\Support\Facades\Cache;

class ScuolaController extends Controller
{
    public function index($region)
    {
        // Create a unique cache key based on the region
        $cacheKey = "schools-for-region:{$region}";

        // Retrieve or create the cache item
        $scuole = Cache::remember($cacheKey, 600, function () use ($region) {
            return Scuola::where('DESCRIZIONECOMUNE', $region)
                ->select('id', 'DENOMINAZIONEISTITUTORIFERIMENTO')
                ->whereIn('id', function ($query) {
                    $query->selectRaw('MIN(id)')
                        ->from('scuole')
                        ->groupBy('DENOMINAZIONEISTITUTORIFERIMENTO');
                })->get();
        });

        if ($scuole->isEmpty()) {
            abort(404, 'Scuola non trovata');
        }

        return view('adozioni.scuola.selectScuola', ['scuole' => $scuole]);
    }
}
