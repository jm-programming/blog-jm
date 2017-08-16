<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Redirect;
use Session;
use Validator;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     	$categories = Category::orderBy('name','asc')->paginate(5);   
    	return view('admin.categories.index', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name' => 'required|unique:categories|max:25',
            
        ]);

        if ($validator->fails()) {
            return redirect('categories/create')
                        ->withErrors($validator)
                        ->withInput();
        }

    	$category = new Category($request->only('name'));
        $category->save();
        Session::flash('message',' Categoria ' . $category->name . ' creada con exito');
        return redirect()->route('categories.index');
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
    	$categories = Category::find($id);
        return view('admin.categories.edit', ['category' => $categories]);
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
            'name' => 'required|unique:categories|max:25',
            
        ]);

        if ($validator->fails()) {
            return redirect()->route('categories.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();
        Session::flash('message', 'Categoria ' . $category->name . ' editada con exito...');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('message','Categoria ' . $category->name . ' elimanada con exito...');
        return redirect()->route('categories.index');
    }
}
