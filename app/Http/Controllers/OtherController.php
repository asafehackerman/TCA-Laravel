<?php

namespace App\Http\Controllers;

use App\Models\Other;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OtherController extends Controller
{
    public function index()
    {
        $others = Other::all();
        return view('other.index', compact('others'));
    }

    public function create()
    {
        return view('other.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string'   => 'O nome deve ser um texto.',
            'nome.max'      => 'O nome não pode ultrapassar 255 caracteres.',

            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max'    => 'A descrição não pode ultrapassar 255 caracteres.',

            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric'  => 'O preço deve ser um número.',
            'preco.min'      => 'O preço não pode ser negativo.',
        ]);

        // ✅ Cria sem a foto primeiro
        $other = Other::create($request->except('foto'));

        // ✅ Trata a imagem depois
        if ($request->hasFile('foto')) {
            $extensao = $request->file('foto')->getClientOriginalExtension();
            $name = $other->id . '_' . time() . '.' . $extensao;

            $request->file('foto')->storeAs('fotos', $name, 'public');

            $other->foto = 'fotos/' . $name;
            $other->save();
        }

        return redirect()->route('other.index');
    }

    public function edit(Other $other)
    {
        return view('other.edit', compact('other'));
    }

    public function update(Request $request, Other $other)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string', 'max:255'],
            'preco' => ['required', 'numeric', 'min:0'],
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string'   => 'O nome deve ser um texto.',
            'nome.max'      => 'O nome não pode ultrapassar 255 caracteres.',

            'descricao.string' => 'A descrição deve ser um texto.',
            'descricao.max'    => 'A descrição não pode ultrapassar 255 caracteres.',

            'preco.required' => 'O preço é obrigatório.',
            'preco.numeric'  => 'O preço deve ser um número.',
            'preco.min'      => 'O preço não pode ser negativo.',
        ]);

        if ($request->hasFile('foto')) {
            $extensao = $request->file('foto')->getClientOriginalExtension();
            $name = $other->id . '_' . time() . '.' . $extensao;

            $request->file('foto')->storeAs('fotos', $name, 'public');

            $other->foto = 'fotos/' . $name;
        }

        // ✅ Atualiza tudo menos a foto separadamente
        $other->update($request->except('foto'));

        return redirect()->route('other.index');
    }

    public function destroy(string $id)
    {
        $other = Other::find($id);

        if ($other) {
            $other->delete(); // soft delete funcionando
        }

        return redirect()->route('other.index');
    }

    public function report()
    {
        $others = Other::all();
        $pdf = Pdf::loadView('other.report', ['others' => $others]);
        return $pdf->stream('others.pdf');
    }
}
