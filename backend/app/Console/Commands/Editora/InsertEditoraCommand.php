<?php

namespace App\Console\Commands\Editora;

use Illuminate\Console\Command;
use App\Repository\EditoraRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class InsertEditoraCommand extends Command
{

    protected $signature = "insert:editora";

    protected $description = "Comando para ler um json e inserir as editoras";

    public function handle()
    {
        $editoraRepository = new EditoraRepository();
        try {
            $file = file_get_contents(__DIR__ . '/editoras.json');
            $json_file = json_decode($file, true);
            $this->info("Cadastrando Editoras...");
            foreach ($json_file as $key => $value) {
                for ($i = 0; $i < count($value); $i++) {
                    $editoraRepository->insert($value[$i]);
                }
            }
            $countEditora = $editoraRepository->getAll()->count();
            $this->info("Total de Editora cadastrada {$countEditora}");
        } catch (\Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
    }
}
