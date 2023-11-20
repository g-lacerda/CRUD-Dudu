<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    protected $table = 'emprestimos';
    protected $primaryKey = 'id_emprestimo';
    protected $fillable = ['id_livro', 'data_emprestimo', 'data_devolucao_prevista', 'data_devolucao', 'status'];

    // Relação com Livro
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'id_livro', 'id_livro');
    }

    // Outras relações, se necessário
}
