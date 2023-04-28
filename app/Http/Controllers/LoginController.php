<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('login', [
            'title' => 'Login Page'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:3|max:255|alpha_dash',
            'password' => 'required|min:5|max:255|alpha_dash'
        ]);

        if(Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginFailed', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255|alpha_dash|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|alpha_dash'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi successfull!');
    }
}
