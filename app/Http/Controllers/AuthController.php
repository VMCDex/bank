<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('login', $request->login)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);

            if ($user->is_admin) {
                return redirect()->route('admin.products.index');
            }

            return redirect('/');
        }

        return back()->withErrors(['login' => 'Неверные учётные данные']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
