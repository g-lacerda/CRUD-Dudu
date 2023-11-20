<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    // Exibir lista de livros
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    // Mostrar formulário de criação de livro
    public function create()
    {
        return view('livros.create');
    }

    // Armazenar um novo livro
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'id_autor' => 'required',
            'id_editora' => 'required',
            'ano_publicacao' => 'required'
        ]);

        Livro::create($request->all());
        return redirect()->route('livros.index')
                         ->with('success', 'Livro criado com sucesso.');
    }

    // Mostrar um livro específico
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    // Mostrar formulário de edição de livro
    public function edit(Livro $livro)
    {
        return view('livros.edit', compact('livro'));
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
