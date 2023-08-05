<?php

namespace Database\Factories;

use App\Models\Scuola;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScuolaFactory extends Factory
{
    protected $model = Scuola::class;

    public function definition()
    {
        return [
            'ANNOSCOLASTICO' => $this->faker->year,
            'AREAGEOGRAFICA' => $this->faker->randomElement(['Nord', 'Centro', 'Sud']),
            'REGIONE' => $this->faker->state,
            'PROVINCIA' => $this->faker->city,
            'CODICEISTITUTORIFERIMENTO' => $this->faker->randomNumber(5),
            'DENOMINAZIONEISTITUTORIFERIMENTO' => $this->faker->company,
            'CODICESCUOLA' => $this->faker->unique()->randomNumber(5),
            'DENOMINAZIONESCUOLA' => $this->faker->company,
            'INDIRIZZOSCUOLA' => $this->faker->address,
            'CAPSCUOLA' => $this->faker->postcode,
            'CODICECOMUNESCUOLA' => $this->faker->randomNumber(5),
            'DESCRIZIONECOMUNE' => $this->faker->city,
            'DESCRIZIONECARATTERISTICASCUOLA' => $this->faker->sentence,
            'DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA' => $this->faker->sentence,
            'INDICAZIONESEDEDIRETTIVO' => $this->faker->randomElement([1, 0]),
            'INDICAZIONESEDEOMNICOMPRENSIVO' => $this->faker->randomElement([1, 0]),
            'INDIRIZZOEMAILSCUOLA' => $this->faker->companyEmail,
            'INDIRIZZOPECSCUOLA' => $this->faker->companyEmail,
            'SITOWEBSCUOLA' => $this->faker->url,
            'SEDESCOLASTICA' => $this->faker->text,
        ];
    }
}
