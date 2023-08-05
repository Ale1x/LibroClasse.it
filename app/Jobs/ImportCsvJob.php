<?php

    namespace App\Jobs;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\DB;

    class ImportCsvJob implements ShouldQueue
    {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        protected $filePath;

        public function __construct(string $filePath)
        {
            $this->filePath = $filePath;
        }

        public function handle()
        {
            $query = sprintf("
            LOAD DATA LOCAL INFILE '%s'
            INTO TABLE adozione_libros
            FIELDS TERMINATED BY ','
            ENCLOSED BY '\"'
            LINES TERMINATED BY '\\n'
            IGNORE 1 ROWS
            (
                @CODICESCUOLA,@ANNOCORSO,@SEZIONEANNO,@TIPOGRADOSCUOLA,@COMBINAZIONE,@DISCIPLINA,@CODICEISBN,@AUTORI,@TITOLO,@SOTTOTITOLO,@VOLUME,@EDITORE,@PREZZO,@NUOVAADOZ,@DAACQUIST,@CONSIGLIATO
            )
            SET
                CODICESCUOLA = TRIM(@CODICESCUOLA),
                ANNOCORSO = TRIM(@ANNOCORSO),
                SEZIONEANNO = TRIM(@SEZIONEANNO),
                TIPOGRADOSCUOLA = TRIM(@TIPOGRADOSCUOLA),
                COMBINAZIONE = TRIM(@COMBINAZIONE),
                DISCIPLINA = TRIM(@DISCIPLINA),
                CODICEISBN = TRIM(@CODICEISBN),
                AUTORI = TRIM(@AUTORI),
                TITOLO = TRIM(@TITOLO),
                SOTTOTITOLO = TRIM(@SOTTOTITOLO),
                VOLUME = TRIM(@VOLUME),
                EDITORE = TRIM(@EDITORE),
                PREZZO = REPLACE(TRIM(@PREZZO), ',', '.'),
                NUOVAADOZ = IF(TRIM(@NUOVAADOZ)='Si', 1, 0),
                DAACQUIST = IF(TRIM(@DAACQUIST)='Si', 1, 0),
                CONSIGLIATO = IF(TRIM(@CONSIGLIATO)='Si', 1, 0)
        ", addslashes($this->filePath));

            DB::connection()->getpdo()->exec($query);
        }
    }
