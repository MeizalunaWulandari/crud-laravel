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
    public function edit($username)
    {
        $data = [
            'user' =>  User::where('username', $username)->first()
        ];
        
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        
        $validatedData = $request->validate([
                    'name' => ['required'],
                    'username' => ['required',"unique:users,username,{$user->id}"],
                    'email' => ['required',"unique:users,email,{$user->id}"],
                    'password' => ['current_password']
            ]);

        $user->update($validatedData);


        return redirect('/user/'.$user->username.'/edit')->with('success', 'qoutes success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
