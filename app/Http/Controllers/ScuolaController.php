<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scuola;
use Illuminate\Support\Facades\Cache;

class ScuolaController extends Controller
{
    public function index($region, $grade)
    {
        $cacheKey = "schools-for-region:{$region}-grade:{$grade}";

        $scuole = Cache::remember($cacheKey, 600, function () use ($region, $grade) {
            return Scuola::where('DESCRIZIONECOMUNE', $region)
                ->where('tipo_scuola', $grade) // Replace 'DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA' column name with 'tipo_scuola'
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
