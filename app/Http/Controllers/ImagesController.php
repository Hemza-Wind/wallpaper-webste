<?php

namespace App\Http\Controllers;
use App\image;
use App\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{




    public function index()
    {
        $wallpapers = DB::table('images')->get();

        return view('/home', compact('wallpapers'));
    }



    public function store(Request $request)
    {


        request()->file('wallpaper')->store('wallpapers');

        $tag  = new Tag;
        $tag->name = $request->tag;
        $tag->save();

        $image =  new image;
        $image->name =  $request->name;
        $image->path =  $request->file('wallpaper')->hashName();
        $image->save();

        $image->tags()->attach($tag->id);
        return back();
    }
}
