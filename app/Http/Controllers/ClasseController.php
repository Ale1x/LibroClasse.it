<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scuola;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class ClasseController extends Controller
{
    public function index($id)
    {
        $cacheKey = "classes-for-school:{$id}";

        $scuola = Scuola::findOrFail($id);

        $codiceScuola = $scuola->CODICESCUOLA;

        $classi = Cache::remember($cacheKey, 600, function () use ($codiceScuola) {
            return DB::table('adozione_libros')
                ->where('CODICESCUOLA', $codiceScuola)
                ->select('ANNOCORSO', 'SEZIONEANNO')
                ->distinct()
                ->get();
        });

        if ($classi->isEmpty()) {
            abort(404, 'Classi non trovate');
        }

        return view('adozioni.classe.selectClasse', ['classi' => $classi, 'scuola' => $scuola]);
    }
}
