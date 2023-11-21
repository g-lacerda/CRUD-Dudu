<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_livro';
    protected $fillable = ['titulo', 'id_autor', 'id_editora', 'id_categoria', 'ano_publicacao'];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor');
    }

    public function editora()
    {
        return $this->belongsTo(Editora::class, 'id_editora');
    }

    // Supondo que você tenha uma relação com Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

}


