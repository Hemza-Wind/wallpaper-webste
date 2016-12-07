<?php

namespace App\Http\Controllers;


use App\Wallpaper;
use App\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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


        $img = Image::make('wallpapers/' . $request->file('wallpaper')->hashName())->resize(240, null,  function ($constraint) {
            $constraint->aspectRatio();
        } )->save('wallpapers/thumbnails/' . $request->file('wallpaper')->hashName(), 60);




        return back();
    }
}
