<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function create()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email:dns', 'unique:users,email'],
                'password' => 'required'
            ]);

            $data = $request->all();

            $data['password'] = Hash::make($data['password']);

            $user = User::create($data);

            event(new Registered($user));
            Auth::login($user);
            return redirect('/dashboard');
        } catch (\Exception $e) {
            $errorMessage = "An error occurred: {$e->getMessage()}";
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }

    public function authenticate(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $request->session()->put('email', $request->input('email'));
                $request->session()->put('password', $request->input('password'));
                return redirect()->intended('/dashboard');
            }
            return response()->json([
                'error' => 'Invalid credentials'
            ]);
        } catch (\Exception $e) {
            $errorMessage = "An error occurred: {$e->getMessage()}";
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
