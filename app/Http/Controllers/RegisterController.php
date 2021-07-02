<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'name' => 'required|max:255',
            'password' => 'required|max:255|min:7',
            'email' => ['required', 'email', 'max:255', 'min:7', Rule::unique('users', 'email')] // the preferred way
        ]);

        User::create($attributes);

//        session()->flash('session', 'Your user account has been created'); // does the same as with below
        return redirect('/')->with('session', 'Your user account has been created');
    }
}
