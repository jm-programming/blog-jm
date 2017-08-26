<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Article;
use App\Tag;
use App\Image;
use Session;
use Redirect;
use Validator;
use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->title)->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
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
        $categories = Category::orderBy('id', 'DESC')->pluck('name' , 'id');
        $tags = Tag::orderBy('id', 'DESC')->pluck('name', 'id');
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|min:5|max:100',
            'content' => 'required|min:8|max:245',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return redirect('articles/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = 'blogfacilito_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . "\imagenes\articles\\";
            
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
        if(Auth::user()->id == $articles->user_id){
            $articles->category;
            //$imagen = $articles->images[0]->id;
            //dd($imagen);
            $categories = Category::orderBy('name', 'ASC')->pluck('name','id');
            $tags = Tag::orderBy('name' , 'ASC')->pluck('name','id');
            $my_tags = $articles->tags->pluck('id')->toArray();
                    
            return view('admin.articles.edit')->with('articles', $articles)
                                              ->with('categories', $categories)
                                              ->with('tags', $tags)
                                              ->with('my_tags', $my_tags);

        }
        else{
            return redirect()->route('articles.index');
        }

        
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
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:8|max:245',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('articles.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $articles = Article::find($id);
        $articles->fill($request->all());
        $articles->save();
        $articles->tags()->sync($request->tags); //llenando la tabla pivot
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
