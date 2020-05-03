<?php

namespace App\Repository;

use App\Entity\Autor;

class AutorRepository
{

    /**
     * Buscar todos os autores do banco
     *
     * @return object
     */
    public function getAll(): object
    {
        return (new Autor())
            ->query()
            ->get();
    }

    /**
     * Buscar um autor do banco
     *
     * @param integer $id
     * @return object
     */
    public function findById(int $id): object
    {
        return (new Autor())
            ->query()
            ->where("id", $id)
            ->first();
    }

    /**
     * Inserir um novo autor no banco
     *
     * @param array $params
     * @return boolean
     */
    public function insert(array $params): bool
    {
        return (new Autor())
            ->fill($params)
            ->save();
    }
    /**
     * Atualizar um autor do banco
     *
     * @param integer $id
     * @param array $params
     * @return boolean
     */
    public function edit(int $id, array $params): bool
    {
        return (new Autor())
            ->query()
            ->where("id", $id)
            ->update($params);
    }

    /**
     * Remover um autor do banco
     *
     * @param integer $id
     * @return boolean
     */
    public function remove(int $id): bool
    {
        return (new Autor())
            ->query()
            ->where("id", $id)
            ->delete();
    }
}
