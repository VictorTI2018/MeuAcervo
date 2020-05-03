<?php

namespace App\Repository;

use App\Entity\Autor;

class AutorRepository {

    /**
     * Inserir um novo autor no banco
     *
     * @param array $params
     * @return boolean
     */
    public function insert(array $params):bool
    {
        return (new Autor())
            ->fill($params)
            ->save();
    }
}