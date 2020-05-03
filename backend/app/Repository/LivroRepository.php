<?php

namespace App\Repository;

use App\Entity\Livro;

class LivroRepository
{

    /**
     * Buscar todos os livros no banco
     *
     * @return object
     */
    public function getAll(): object
    {
        return (new Livro())
            ->query()
            ->with(["editora", "autor"])
            ->get();
    }

    /**
     * Inserir um novo livro no banco de dados
     *
     * @param array $params
     * @return boolean
     */
    public function insert(array $params): bool
    {
        return (new Livro())
            ->fill($params)
            ->save();
    }
}
