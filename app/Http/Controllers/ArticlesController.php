<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Tag;
use App\Image;
use Session;
use Redirect;
use DB;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->title)->orderBy('id', 'DESC')->paginate(5);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create')
                     ->with('categories', $categories)
                     ->with('tags', $tags);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = 'blogfacilito_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . "\images\articles";
            $file->move($path,$name);
        }

        $articles = new Article($request->all());
        $articles->user_id = \Auth::user()->id;
        $articles->save();

        $articles->tags()->sync($request->tags);

        $image = new Image();
        $image->name = $name;
        $image->article()->associate($articles);
        $image->save();

        Session::flash('message', ' Articulo ' . $articles->title . ' creado con exito...');
        return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Article::find($id);
        $articles->category;

        $categories = Category::orderBy('name', 'ASC')->get();
        $tags = Tag::orderBy('name' , 'ASC')->get()/*->toArray()*/;
        $my_tags = $articles->tags;
                
        return view('admin.articles.edit')->with('articles', $articles)
                                          ->with('categories', $categories)
                                          ->with('tags', $tags);
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
        
        $articles = Article::find($id);
        $articles->fill($request->all());
        $articles->save();
        Session::flash('message', 'Article ' . $articles->title . ' editado con exito...');
        return redirect()->route('articles.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::find($id);
        $articles->delete();
        session()->flash('message', 'Articulo ' . $articles->title . ' eliminado con exito...');
        return redirect()->route('articles.index');
    }
}
