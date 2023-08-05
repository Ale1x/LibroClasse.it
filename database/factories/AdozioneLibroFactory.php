<?php

namespace Database\Factories;

use App\Models\AdozioneLibro;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdozioneLibroFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdozioneLibro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CODICESCUOLA' => $this->faker->bothify('????#######'),
            'ANNOCORSO' => $this->faker->numberBetween(1, 5),
            'SEZIONEANNO' => $this->faker->randomLetter,
            'TIPOGRADOSCUOLA' => $this->faker->randomElement(['Primaria', 'Secondaria']),
            'COMBINAZIONE' => $this->faker->word,
            'DISCIPLINA' => $this->faker->word,
            'CODICEISBN' => $this->faker->isbn13,
            'AUTORI' => $this->faker->name,
            'TITOLO' => $this->faker->sentence,
            'SOTTOTITOLO' => $this->faker->sentence,
            'VOLUME' => $this->faker->word,
            'EDITORE' => $this->faker->company,
            'PREZZO' => $this->faker->randomFloat(2, 10, 200),
            'NUOVAADOZ' => $this->faker->boolean,
            'DAACQUIST' => $this->faker->boolean,
            'CONSIGLIATO' => $this->faker->boolean,
        ];
    }
}
