<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoScuolaToScuoleTable extends Migration
{
    public function up()
    {
        Schema::table('scuole', function (Blueprint $table) {
            $table->string('tipo_scuola')->after('SEDESCOLASTICA'); // you may choose the best spot for it
        });
    }

    public function down()
    {
        Schema::table('scuole', function (Blueprint $table) {
            $table->dropColumn('tipo_scuola');
        });
    }
}
