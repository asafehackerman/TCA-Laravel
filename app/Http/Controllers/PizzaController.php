<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index()
    {
        $pizzas = Pizza::all();
        return view('pizza.index', compact('pizzas'));
    }

    public function create()
    {
        return view('pizza.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
            'categoria' => ['required', 'string', 'max:100'],
        ], [
            'nome.required' => 'O nome da pizza é obrigatório.',
            'nome.string'   => 'O nome da pizza deve ser um texto.',
            'nome.max'      => 'O nome da pizza não pode ultrapassar 255 caracteres.',

            'preco.required' => 'O preço da pizza é obrigatório.',
            'preco.numeric'  => 'O preço da pizza deve ser um número.',
            'preco.min'      => 'O preço da pizza não pode ser negativo.',

            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.string'   => 'A categoria deve ser um texto.',
            'categoria.max'      => 'A categoria não pode ultrapassar 100 caracteres.',
        ]);

        if($request->hasFile('foto')) {
                // Upload File
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $name = $aluno->id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $aluno->foto = 'fotos/'.$name;
                $aluno->save();
        }

        Pizza::create($request->all());
        return redirect()->route('pizza.index');
    }

    public function edit(Pizza $pizza)
    {
        return view('pizza.edit', compact('pizza'));
    }

    public function update(Request $request, Pizza $pizza)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
            'categoria' => ['required', 'string', 'max:100'],
        ], [
            'nome.required' => 'O nome da pizza é obrigatório.',
            'nome.string'   => 'O nome da pizza deve ser um texto.',
            'nome.max'      => 'O nome da pizza não pode ultrapassar 255 caracteres.',

            'preco.required' => 'O preço da pizza é obrigatório.',
            'preco.numeric'  => 'O preço da pizza deve ser um número.',
            'preco.min'      => 'O preço da pizza não pode ser negativo.',

            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.string'   => 'A categoria deve ser um texto.',
            'categoria.max'      => 'A categoria não pode ultrapassar 100 caracteres.',
        ]);

        if($request->hasFile('foto')) {
                // Upload File
                $extensao_arq = $request->file('foto')->getClientOriginalExtension();
                $name = $aluno->id.'_'.time().'.'.$extensao_arq;
                $request->file('foto')->storeAs('fotos', $name, ['disk' => 'public']);
                $aluno->foto = 'fotos/'.$name;
                $aluno->save();
        }

        $pizza->update($request->all());
        return redirect()->route('pizza.index');
    }

    public function destroy(string $id)
    {
        $pizza = Pizza::find($id);
        if(isset($pizza)) {
            $pizza->delete();
        }

        return redirect()->route('pizza.index');
    }
}