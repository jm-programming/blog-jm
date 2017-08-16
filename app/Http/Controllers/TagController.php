<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Redirect;
use Session;
use Validator;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderby('name')->paginate(5);
        return view('admin.tags.index')->with(['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name' => 'required|unique:tags|max:150',
        ]);

        if ($validator->fails()) {
            return redirect('tags/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $tag = new Tag($request->only('name'));
        $tag->save();
        Session::flash('message','Tag ' . $tag->name .  ' creado con exito...' );
        return redirect()->route('tags.index');
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
        $tag = Tag::find($id);
        return view('admin.tags.edit')->with(['tag' => $tag]);
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
            'name' => 'required|unique:tags|max:150',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('tags.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $tag = Tag::find($id);
        $tag->fill($request->all());
        $tag->save();
        $request->session()->flash('message', 'Tag ' . $tag->name . ' editado con exito...');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        Session::flash('message', 'Tag ' . $tag->name . ' eliminado con exito...');
        return redirect()->route('tags.index');
    }
}
