<?php

namespace App\Repository;

use App\Entity\Editora;

class EditoraRepository
{

    public function getAll(): object
    {
        return (new Editora())
            ->query()
            ->get();
    }

    /**
     * Cadastrar uma editora
     *
     * @param array $params
     * @return boolean
     */
    public function insert(array $params): bool
    {
        return (new Editora())->fill($params)->save();
    }
}
