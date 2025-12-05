<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email', 'ends_with:@gmail.com'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser uma string.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email não é válido.',
            'email.unique' => 'Este email já existe.',
            'email.ends_with' => 'O email deve terminar com @gmail.com.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'A confirmação da senha não confere.',
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        
        // Hash da senha
        $user->password = $request->password ? bcrypt($request->password) : null;

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if ($user) {
            return view('user.edit', compact('user'));
        }

        return redirect()->route('user.index');
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;

            // Atualiza senha somente se preenchida
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if(isset($user)) {
            $user->delete();
        }

        return redirect()->route('user.index');
    }

    /**
     * Generate PDF report of users.
     */
    public function report()
    {
        $users = User::all();
        $pdf = Pdf::loadView('user.report', ['users' => $users]);
        return $pdf->stream('users.pdf');
    }
}
