<?php

namespace App\Http\Controllers;

use App\Models\Autentikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AutentikasiController extends Controller
{
    public function loginForm()
    {
        return view('login.login');
    }
    public function registerForm()
    {
        return view('login.register');
    }
    public function register(Request $request)
    {
        $user = new Autentikasi;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login.input');
    }
    public function login(Request $request)
    {

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            return redirect('dashboard');
        } else {
            return back()->withInput()->with('error', 'Email atau kata sandi salah. Silakan coba lagi.');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
