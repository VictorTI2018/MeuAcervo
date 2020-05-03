<?php

namespace App\Repository;

use App\Entity\Livro;

class LivroRepository
{

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
