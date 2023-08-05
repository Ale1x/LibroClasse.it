<?php

namespace App\Console\Commands;

use App\Jobs\ImportScuolaCsvJob;
use Illuminate\Console\Command;

class ImportScuolaCsv extends Command
{
    protected $signature = 'import:scuole {file}';

    protected $description = 'Importazione dei dati della scuola da un file CSV nel database';

    public function handle()
    {
        $filePath = $this->argument('file');

        if (!file_exists($filePath) || !is_readable($filePath)) {
            $this->error("Il file {$filePath} non esiste o non è leggibile.");
            return;
        }

        dispatch(new ImportScuolaCsvJob($filePath));

        $this->info("Importazione scuola da {$filePath} completata con successo");
    }
}
