<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        $images = $images->each(function($images){
            $images->article;
        });
        
        return view('admin.images.index')->with('images', $images);
                                        

    }

    
}
