<?php

namespace Tests\Unit;

use App\Http\Controllers\AdozioneLibroController;
use App\Models\AdozioneLibro;
use App\Models\Scuola;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdozioneLibroControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $controller;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller = new AdozioneLibroController();
    }

    /** @test */
    public function testGetLibriFunction()
    {
        // Creare un record Scuola tramite una factory
        $scuola = Scuola::factory()->create();

        // Creare un record AdozioneLibro tramite una factory. Assicurarsi che il codice Scuola corrisponda a quello della scuola creata sopra.
        $libro = AdozioneLibro::factory()->make([
            'CODICESCUOLA' => $scuola->CODICESCUOLA,
            // Assicurarsi che i dettagli corrispondano ad una classe valida
            'ANNOCORSO' => $annoCorso = 1,
            'SEZIONEANNO' => $sezioneAnno = 'A',
        ]);
        $scuola->adozioniLibri()->save($libro);

        $response = $this->controller->getLibri($scuola->CODICESCUOLA, "$annoCorso-$sezioneAnno");

        // Verificare che la risposta includa il libro
        $this->assertNotEmpty($response);
        $this->assertEquals($libro->CODICESCUOLA, $response->first()->CODICESCUOLA);
        $this->assertEquals($libro->ANNOCORSO, $response->first()->ANNOCORSO);
        $this->assertEquals($libro->SEZIONEANNO, $response->first()->SEZIONEANNO);
    }

    public function testGetClassiFunction()
        {
            // Creare un record Scuola tramite una factory
            $scuola = Scuola::factory()->create();

            // Creare un record AdozioneLibro tramite una factory. Assicurati che il codice Scuola corrisponda a quello della scuola creata sopra.
            AdozioneLibro::factory()->create([
                'CODICESCUOLA' => $scuola->CODICESCUOLA,
                'ANNOCORSO' => 1,
                'SEZIONEANNO' => 'A',
            ]);

            $response = $this->controller->getClassi($scuola->CODICESCUOLA);

            // Verificare che la risposta includa le classi
            $this->assertNotEmpty($response);
            // Verifica che il primo record contenga gli attributi corretti
            $this->assertEquals(1, $response->first()->ANNOCORSO);
            $this->assertEquals('A', $response->first()->SEZIONEANNO);
        }


}
