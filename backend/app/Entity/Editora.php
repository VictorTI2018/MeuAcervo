<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Editora extends Model {

    protected $table = 'editoras';

    protected $fillable = ['nome'];

    public function livros()
    {
        return $this->hasMany(Livro::class, 'id', 'editora_id');
    }    
}