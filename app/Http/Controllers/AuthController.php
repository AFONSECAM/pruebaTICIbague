<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        User::where('email', $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Bienvenid@ ' . Auth::user()->name, 'Ha ingresado exitosamente al sistema!');
            return redirect()->intended('/dashboard');
        } else {
            Alert::error('Error', 'Login failed !');
            return redirect('/login');
        }
    }

    public function register()
    {
        $employees = Employee::all();
        return view('auth.register', [
            'title' => 'Register',
            'employees' => $employees
        ]);
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($request['password']);

        $user = User::create($validated);

        Alert::success('Exito', 'El registro del usuario ' . $request->name . ' ha sido correcto!');
        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Hasta pronto', 'Cerró la sesión correctamente!');
        return redirect('/login');
    }    
}
