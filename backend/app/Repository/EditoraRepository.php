<?php

namespace App\Repository;

use App\Entity\Autor;
use App\Entity\Editora;

class EditoraRepository
{

    /**
     * Buscar todas as  do banco
     *
     * @return object
     */
    public function getAll(): object
    {
        return (new Editora())
            ->query()
            ->get();
    }

    /**
     * Buscar uma editora no banco
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
     * Inserir uma editora no banco
     *
     * @param array $params
     * @return boolean
     */
    public function insert(array $params): bool
    {
        return (new Editora())->fill($params)->save();
    }

    /**
     * Editar uma editora no banco
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
     * Remover uma editora do banco
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
