<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use Redirect;
use Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('type','asc')->paginate(5);
        return view('admin.users.index', ['users'=> $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8',
            'type'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('users/create')
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $user = new User($request->only('name','type','email', 'password'));
        $user->password = bcrypt($request->password);
        $user->save();
        session::flash('message', 'Usuario ' . $user->name . ' creado con exito');
        return redirect('/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);

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
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'type'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->type = $request->type;
        $user->email = $request->email;
        $user->save();
        session::flash('message', 'Usuario ' . $user->name . ' editado con exito');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete($id);	
        session::flash('message', 'Usuario ' . $user->name . ' eliminado con exito');
        return redirect('/users');
    }
}
