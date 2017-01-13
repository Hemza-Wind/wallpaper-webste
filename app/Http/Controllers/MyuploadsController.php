<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MyuploadsController extends Controller
{
    public function index()
    {

        $wallpapers = DB::table('Wallpaper')->get();
        $users = DB::table('users')->get();


        return view('/my-uploads', compact('wallpapers', 'users'));

    }
    public function destroy(Request $request)
    {

        return $this->index();
    }
}
