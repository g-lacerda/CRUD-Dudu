<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_livro';
    protected $fillable = ['titulo', 'id_autor', 'id_editora', 'ano_publicacao'];
}
