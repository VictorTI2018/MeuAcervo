<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model {

    protected $table = 'livros';

    protected $filable = [
        'nome', 'data_pub', 'descricao', 'editora_id', 'autor_id'
    ];

    public function editora()
    {
        return $this->belongsTo(Editora::class, 'editora_id', 'id');
    }

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id', 'id');
    }
}