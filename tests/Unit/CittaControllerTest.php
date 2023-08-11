<?php

namespace Tests\Unit;

use App\Http\Controllers\CittaController;
use App\Models\Scuola;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class CittaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $cittaController;

    /**
     * Setup the test environment
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->cittaController = new CittaController();
    }

    /**
     * Test index method
     */
    public function testIndex()
    {
        $province = 'mock-province';

        Scuola::factory()->create([
            'PROVINCIA' => $province,
            'DESCRIZIONECOMUNE' => 'mock-city',
        ]);

        $response = $this->get("/citta/{$province}");

        $response->assertStatus(200);
        $response->assertViewHas('cities');
        $response->assertViewHas('province', $province);
    }

    /**
     * Test index method with empty cities.
     */
    public function testIndexWithEmptyCities()
    {
        $province = 'mock-province';

        $response = $this->get("/citta/{$province}");

        $response->assertStatus(404);
    }
}
