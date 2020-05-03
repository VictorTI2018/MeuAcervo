<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{

    protected $table = 'autores';

    protected $fillable = [
        'nome', 'sobrenome'
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class, 'id', 'autor_id');
    }
}
