<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if($user) {
            return redirect()->route('login')->with('success', 'Registered Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Cannot register');
        }
        
    }

    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        $credentials = $request->only('name', 'password');

        if(Auth::attempt($credentials)) {
            // if authentication passed
            return redirect()->route('contact.index')->with('success', 'Login Successfully');
        } else{
            return back()->withInput()->with('error', 'Invalid credentials');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out');
    }
}
