<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use App\Models\Editora;
use App\Models\Categoria;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    // Exibir lista de livros com modais para editar e deletar
    public function index()
    {
        $livros = Livro::with(['autor', 'editora', 'categoria'])->get();
        return view('index', compact('livros'));
    }

    // Armazenar um novo livro
    public function store(Request $request)
    {
        
    // Validação dos campos
    $request->validate([
        'titulo' => 'required',
        'autor' => 'required',
        'editora' => 'required',
        'categoria' => 'required',
        'ano_publicacao' => 'required|integer|min:1|max:2023',
    ]);

        
            
        // Busca ou cria o autor e obtém seu ID
        $autor = Autor::firstOrCreate(['nome' => $request->autor]);        

        // Busca ou cria a editora e obtém seu ID
        $editora = Editora::firstOrCreate(['nome' => $request->editora]);

        // Busca ou cria a categoria e obtém seu ID
        $categoria = Categoria::firstOrCreate(['nome' => $request->categoria]);

        // Verifica se todos os IDs são não nulos
        if ($autor->id_autor && $editora->id_editora && $categoria->id_categoria) {
            Livro::create([
                'titulo' => $request->titulo,
                'id_autor' => $autor->id_autor,
                'id_editora' => $editora->id_editora,
                'id_categoria' => $categoria->id_categoria,
                'ano_publicacao' => $request->ano_publicacao
            ]);
            return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso.');
        } else {
            dd('idAutor, idEditora, idCategoria', $autor->id_autor, $autor->nome, $editora->id_editora, $editora->nome, $categoria->id_categoria, $categoria->nome);
            // Retorna um erro ou mensagem indicando que a criação falhou
        }
    }

    // Atualizar um livro específico
    public function update(Request $request, Livro $livro)
    {
        $request->validate([
            'titulo' => 'required',
            'id_autor' => 'required',
            'id_editora' => 'required',
            'ano_publicacao' => 'required'
        ]);

        $livro->update($request->all());
        return redirect()->route('livros.index')
                         ->with('success', 'Livro atualizado com sucesso.');
    }

    // Deletar um livro
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')
                         ->with('success', 'Livro deletado com sucesso.');
    }
}
