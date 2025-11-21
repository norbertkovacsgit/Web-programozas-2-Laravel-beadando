<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate(
            [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'name.required'     => 'A név megadása kötelező.',
                'email.required'    => 'Az email mező kitöltése kötelező.',
                'email.email'       => 'Kérjük, érvényes email címet adjon meg.',
                'email.unique'      => 'Ezzel az email címmel már regisztráltak.',
                'password.required' => 'A jelszó megadása kötelező.',
                'password.min'      => 'A jelszónak legalább 6 karakter hosszúnak kell lennie.',
                'password.confirmed' => 'A jelszó megerősítése nem egyezik.',
            ]
        );

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'role'     => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email'    => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required'    => 'Az email mező kitöltése kötelező.',
                'email.email'       => 'Kérjük, érvényes email címet adjon meg.',
                'password.required' => 'A jelszó megadása kötelező.',
            ]
        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()->withErrors([
            'email' => 'Hibás email / jelszó kombináció.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
