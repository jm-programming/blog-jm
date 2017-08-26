<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use Redirect;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('auth/edit')->with(['user' => $user]);
    }

    public function update(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=> 'required|min:5|confirmed',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.edit', Auth::user()->id)
                        ->withErrors($validator)
                        ->withInput();
        }

        
        $usuario = User::find(Auth::user()->id);
        $usuario->fill($request->all());
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        $request->session()->flash('message', Auth::user()->name . ' haz actualizado tu cuenta correctamente...');
        return redirect('/');
        


    }




}
