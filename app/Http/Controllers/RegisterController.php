<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:64'],
            'username' =>  ['required', 'unique:users', 'max:32'],
            'email' =>  ['required', 'unique:users', 'email:dns'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $validatedData['password'] = Hash::make($request->password);
        // dd($validatedData);
        User::create($validatedData);


        return redirect('/auth/register')->with('success', 'account created');
    }
}
