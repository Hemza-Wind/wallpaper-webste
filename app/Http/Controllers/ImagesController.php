<?php

namespace App\Http\Controllers;


use App\Wallpaper;
use App\Tag;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{




    public function index()
    {
        $wallpapers = DB::table('Wallpaper')->get();
        $users = DB::table('users')->get();


        return view('/home', compact('wallpapers', 'users'));
    }



    public function store(Request $request)
    {



        request()->file('wallpaper')->store('wallpapers');

        $tag  = new Tag;
        $tag->name = $request->tag;
        $tag->save();

        $Wallpaper =  new Wallpaper;
        $Wallpaper->name =  $request->name;
        if (Auth::check()) {
            $Wallpaper->uploadedby = Auth::id();
        }else{
            $Wallpaper->uploadedby = null;
        }
        $Wallpaper->path =  $request->file('wallpaper')->hashName();
        $Wallpaper->save();

        $Wallpaper->tags()->attach($tag->id);


        $img = Image::make('wallpapers/' . $request->file('wallpaper')->hashName())->resize(240, null,  function ($constraint) {
            $constraint->aspectRatio();
        } )->save('wallpapers/thumbnails/' . $request->file('wallpaper')->hashName(), 50);
        
        return back();
    }


}
