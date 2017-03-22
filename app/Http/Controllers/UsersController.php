<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;  

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id != Auth::id()){
            abort(403,'Brak dostępu');
        }

        $user = Auth::user();
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($id != Auth::id()){
            abort(403,'Brak dostępu');
        }

        $this->validate($request,[
            'name'=>'required|min:3',
            'email'=> [
                'required',
                'email',
                Rule::unique('users'),
            ]
        ],[
            'required' => 'Pole jest wymagane',
            'email' => 'Adres email jest niepoprawny',
            'unique' => 'Ten adres jest już zajęty',
            'min' => 'Pole musi mieć minimum 3 znaki',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->sex   = $request->sex;
        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
