<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScuolasTable extends Migration
{
    public function up()
    {
        Schema::create('scuole', function (Blueprint $table) {
            $table->id();
            $table->string('ANNOSCOLASTICO');
            $table->string('AREAGEOGRAFICA');
            $table->string('REGIONE');
            $table->string('PROVINCIA');
            $table->string('CODICEISTITUTORIFERIMENTO')->nullable();
            $table->string('DENOMINAZIONEISTITUTORIFERIMENTO')->nullable();
            $table->string('CODICESCUOLA');
            $table->string('DENOMINAZIONESCUOLA')->nullable();
            $table->string('INDIRIZZOSCUOLA')->nullable();
            $table->string('CAPSCUOLA')->nullable();
            $table->string('CODICECOMUNESCUOLA')->nullable();
            $table->string('DESCRIZIONECOMUNE')->nullable();
            $table->string('DESCRIZIONECARATTERISTICASCUOLA')->nullable();
            $table->string('DESCRIZIONETIPOLOGIAGRADOISTRUZIONESCUOLA')->nullable();
            $table->string('INDICAZIONESEDEDIRETTIVO')->nullable();
            $table->string('INDICAZIONESEDEOMNICOMPRENSIVO')->nullable();
            $table->string('INDIRIZZOEMAILSCUOLA')->nullable();
            $table->string('INDIRIZZOPECSCUOLA')->nullable();
            $table->string('SITOWEBSCUOLA')->nullable();
            $table->string('SEDESCOLASTICA')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scuole');
    }
}
