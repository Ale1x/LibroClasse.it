<?php

namespace Tests\Unit;

use App\Http\Controllers\AdozioneLibroController;
use App\Models\AdozioneLibro;
use App\Models\Scuola;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class AdozioneLibroControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();
        $this->adozioneLibroController = new AdozioneLibroController;
    }

    // Testing getLibri function.
    public function testGetLibri()
    {
        $scuola = Scuola::factory()->create();
        $libro = AdozioneLibro::factory()->create(['CODICESCUOLA' => $scuola->CODICESCUOLA]);

        $codiceScuola = $scuola->CODICESCUOLA;
        $classe = $libro->ANNOCORSO. '-' .$libro->SEZIONEANNO;

        $data = $this->adozioneLibroController->getLibri($codiceScuola, $classe);

        $this->assertNotEmpty($data);
    }

    // Testing index function.
    public function testIndex()
    {
        $scuola = Scuola::factory()->create();
        $libro = AdozioneLibro::factory()->create(['CODICESCUOLA' => $scuola->CODICESCUOLA]);

        $codiceScuola = $scuola->CODICESCUOLA;
        $class = $libro->ANNOCORSO. $libro->SEZIONEANNO;

        $response = $this->get("/libri/{$codiceScuola}/{$class}");

        $response->assertStatus(200);
    }
}
