<?php

namespace App\Console\Commands;

use App\Jobs\ImportCsvJob;
use Illuminate\Console\Command;

class ImportCsv extends Command
{
    protected $signature = 'import:csv {file}';

    protected $description = 'Importa dati da un file CSV nel database';

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath) || !is_readable($filePath)) {
            $this->error("Il file {$filePath} non esiste o non è leggibile.");
            return;
        }

        dispatch(new ImportCsvJob($filePath));

        $this->info("Importazione da {$filePath} iniziata con successo");
    }
}
