<?php

namespace App\Http\Controllers;
use App\image;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function store(Request $request)
    {

        request()->file('wallpaper')->hashName();
       image::create($request->all());

        return back();
    }
}
