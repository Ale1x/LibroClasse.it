<?php

namespace App\Http\Controllers;

use App\Models\AdozioneLibro;
use App\Models\Scuola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdozioneLibroController extends Controller
{
    public function getClassi($codiceScuola)
    {
        return Cache::remember("anno_sezione_for_school:{$codiceScuola}", 600, function () use ($codiceScuola) {
            $scuola = Scuola::where('CODICESCUOLA', $codiceScuola)->first();

            if (!$scuola) {
                return [];
            }

            return $scuola->adozioniLibri()
                ->select('ANNOCORSO', 'SEZIONEANNO')
                ->distinct()
                ->get();
        });
    }

    public function getLibri($codiceScuola, $classe)
    {
        return Cache::remember("libri_for_school_classe:{$codiceScuola}_{$classe}", 600, function () use ($codiceScuola, $classe) {
            $classeDecoded = urldecode($classe);
            if (strpos($classeDecoded, '-') === false) {
                return response()->json(['error' => 'Invalid classe format'], 400);
            }
            list($annoCorso, $sezioneAnno) = explode('-', $classeDecoded);

            $scuola = Scuola::where('CODICESCUOLA', $codiceScuola)->first();

            if (!$scuola) {
                return [];
            }

            return $scuola->adozioniLibri()
                ->where('ANNOCORSO', $annoCorso)
                ->where('SEZIONEANNO', $sezioneAnno)
                ->select('CODICESCUOLA', 'ANNOCORSO', 'SEZIONEANNO', 'TIPOGRADOSCUOLA', 'COMBINAZIONE', 'DISCIPLINA', 'CODICEISBN', 'AUTORI', 'TITOLO', 'SOTTOTITOLO', 'VOLUME', 'EDITORE', 'PREZZO', 'NUOVAADOZ', 'DAACQUIST', 'CONSIGLIATO')
                ->get();
        });
    }

    public function index($codiceScuola, $class)
    {
        $scuola = Scuola::where('CODICESCUOLA', $codiceScuola)->first();

        // Handle situation where no matching Scuola is found
        if (!$scuola) {
            // replace with your own error handling logic
            abort(404, 'Scuola not found');
        }


        $annoCorso = substr($class, 0, 1); // supponendo che ANSOCORSO sia il primo carattere del nome della classe
        $sezioneAnno = substr($class, 1); // supponendo che SEZIONEANNO sia tutto tranne il primo carattere del nome della classe

        //ottiene tutti i libri per la scuola e la classe specifiche
        $books = AdozioneLibro::where('CODICESCUOLA', $codiceScuola)
            ->where('ANNOCORSO', $annoCorso)
            ->where('SEZIONEANNO', $sezioneAnno)
            ->get();

        return view('adozioni.libri.libriResponse', ['books' => $books, 'classe' => $class]);
    }

    public function showApi() {
        return view('adozioni.api.apiIndex');
    }
}
