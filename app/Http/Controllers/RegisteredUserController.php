<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function index(){}
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', Password::min(6), 'confirmed'],
        ]);

        $user = User::create($attributes);

        Auth::login($user);
        return redirect('/jobs');
    }
}
