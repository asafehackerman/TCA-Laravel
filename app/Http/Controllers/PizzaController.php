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
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'categoria' => 'required|string|max:100',
        ]);

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
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric',
            'categoria' => 'required|string|max:100',
        ]);

        $pizza->update($request->all());
        return redirect()->route('pizza.index');
    }

    public function destroy(Pizza $pizza)
    {
        $pizza->delete();
        return redirect()->route('pizza.index');
    }
}