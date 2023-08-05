<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdozioneLibroTable extends Migration
{
    public function up()
    {
        Schema::create('adozione_libros', function (Blueprint $table) {
            $table->id();
            $table->string('CODICESCUOLA');
            $table->string('ANNOCORSO');
            $table->string('SEZIONEANNO');
            $table->string('TIPOGRADOSCUOLA');
            $table->string('COMBINAZIONE')->nullable();
            $table->string('DISCIPLINA');
            $table->string('CODICEISBN');
            $table->string('AUTORI');
            $table->string('TITOLO');
            $table->string('SOTTOTITOLO')->nullable();
            $table->string('VOLUME')->nullable();
            $table->string('EDITORE');
            $table->decimal('PREZZO', 6, 2);
            $table->boolean('NUOVAADOZ');
            $table->boolean('DAACQUIST');
            $table->boolean('CONSIGLIATO');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('adozione_libros');
    }
}
