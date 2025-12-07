<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        Gate::authorize('viewAny', User::class);

        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        Gate::authorize('create', User::class);

        return view('user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', User::class);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
        Gate::authorize('edit', User::class);

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
        Gate::authorize('edit', User::class);

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
        Gate::authorize('delete', User::class);

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