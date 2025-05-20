<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function create(){
        return view('session.login');
    }
    public function store(){
        $attributes = request()->validate([
            'email' => ['required', 'email', Rule::in(User::pluck('email')->toArray())],
            'password' => 'required'
        ]);
        if (! Auth::attempt($attributes)){
            throw ValidationException::withMessages(
                [
                    'password'=>"Password incorrect"
                ]
            );
        }
        request()->session()->regenerate();

        return redirect(route('dashboard'));

    }
    public function destroy(){
        Auth::logout();
        return redirect("/login");
    }
}
