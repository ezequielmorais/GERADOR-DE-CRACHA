<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;

class ApagarFotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:apagar-fotos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $folderPath = public_path('uploads/images');

        // Verifica se a pasta existe
        if (File::exists($folderPath)) {
            // Remove todos os arquivos da pasta
            File::cleanDirectory($folderPath);
            $this->info('Todas as fotos foram apagadas da pasta de uploads.');
        } else {
            $this->warn('A pasta de uploads não existe.');
        }
    }
}