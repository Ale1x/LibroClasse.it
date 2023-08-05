<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AdozioneLibro extends Model
{
    use HasFactory;

    protected $fillable = [
        'CODICESCUOLA', 'ANNOCORSO', 'SEZIONEANNO', 'TIPOGRADOSCUOLA', 'COMBINAZIONE',
        'DISCIPLINA', 'CODICEISBN', 'AUTORI', 'TITOLO', 'SOTTOTITOLO', 'VOLUME',
        'EDITORE', 'PREZZO', 'NUOVAADOZ', 'DAACQUIST', 'CONSIGLIATO'
    ];

    public function scuola()
    {
        return $this->belongsTo(Scuola::class, 'CODICESCUOLA', 'CODICESCUOLA');
    }

    public function getCachedScuola() {
        return Cache::remember("school_for_libro:{$this->CODICESCUOLA}", 600, function () {
            return $this->scuola;
        });
    }
}
