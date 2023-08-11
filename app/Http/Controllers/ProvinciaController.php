<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Models\Scuola;

class ProvinciaController extends Controller
{
    public function index($region)
    {
        $cacheKey = "provinces-for-region:{$region}";

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
