<?php

namespace App\Http\Controllers;


use App\Wallpaper;
use App\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class ImagesController extends Controller
{




    public function index()
    {
        $wallpapers = DB::table('Wallpaper')->get();

        return view('/home', compact('wallpapers'));
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'wallpaper' => 'required|mimes:jpeg,jpg,png'
        ]);

        request()->file('wallpaper')->store('wallpapers');


       




        $tag  = new Tag;
        $tag->name = $request->tag;
        $tag->save();

        $Wallpaper =  new Wallpaper;
        $Wallpaper->name =  $request->name;
        $Wallpaper->path =  $request->file('wallpaper')->hashName();
        $Wallpaper->save();

        $Wallpaper->tags()->attach($tag->id);
        return back();
    }
}
