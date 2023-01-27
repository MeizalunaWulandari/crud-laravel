<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Qoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $data = [
            'qoutes' => Qoute::where('user_id', auth()->user()->id)->get(),
        ];
        return view('user.index', $data);
    }

    public function show($username)
    {
        $data = [
            'user' =>  User::where('username', $username)->first()
        ];

        return view('user.profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username, Request $request)
    {
        $data = [
            'user' =>  User::where('username', $username)->first()
        ];
        
        if ($request->segment(4) === "password") {
            return view('user.password', $data);
        }

        return view('user.edit', $data);

        
    }

    public function update(Request $request)
    {

        $user = User::where('username', $request->segment(2))->first();
        
        $rules = [
              'name' => ['required'],
              'username' => ['required',"unique:users,username,{$user->id}"],
              'email' => ['required',"unique:users,email,{$user->id}"],
              'password' => ['required','current_password']
            ];
        if ($validatedData = $request->validate($rules)) {
            $validatedData['password'] = Hash::make($request->password);    
        }
        

        // Harus Petik 2 " " {$user->id} Primary key
        // 'username' => ['required',"unique:users,username,{$user->id}"],

        $user->update($validatedData);


        return redirect('/user/'.$user->username.'/edit')->with('success', 'qoutes success updated');
    }


    public function changePassword(Request $request)
    {
        $user = User::where('username', $request->segment(2))->first();

        // dd($user);
        $validatedData = $request->validate([
                    'password' => ['required', 'current_password'],
                    'newPassword' => ['required', 'confirmed', 'min:8']
        ]);

        $user->update([
            'password' => Hash::make($request->newPassword)
        ]);
        return redirect('/user/'.$user->username.'/edit/password')->with('success', 'password success updated');
    }
}
