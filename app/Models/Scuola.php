<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Scuola extends Model
{
    use HasFactory;

    protected $table = 'scuole';

    protected $fillable = [
        'ANNOSCOLASTICO', 'AREAGEOGRAFICA', 'REGIONE',
        'PROVINCIA', 'CODICEISTITUTORIFERIMENTO',
        'DENOMINAZIONEISTITUTORIFERIMENTO', 'CODICESCUOLA',
        'DENOMINAZIONESCUOLA', 'INDIRIZZOSCUOLA',
        'CAPSCUOLA', 'CODICECOMUNESCUOLA',
        'DESCRIZIONECOMUNE', 'DESCRIZIONECARATTERISTICASCUOLA',
        'DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA',
        'INDICAZIONESEDEDIRETTIVO',
        'INDICAZIONESEDEOMNICOMPRENSIVO', 'INDIRIZZOEMAILSCUOLA',
        'INDIRIZZOPECSCUOLA', 'SITOWEBSCUOLA',
        'SEDESCOLASTICA', 'tipo_scuola'
    ];

    public function adozioniLibri()
    {
        return $this->hasMany(AdozioneLibro::class, 'CODICESCUOLA', 'CODICESCUOLA');
    }

    public function getCachedAdozioniLibri()
    {
        return Cache::remember("adozioni_libri_for_school:{$this->CODICESCUOLA}", 600, function () {
            return $this->adozioniLibri()->get();
        });
    }
}
