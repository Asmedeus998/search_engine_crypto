<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function update(Request $request)
    {
        $file = $request->file('image');
        $extension = $request->file('image');
        // for some reason I need to make imgName have a file and extension combine together to make delete to work.
        $imgName = $file->getClientOriginalName().'_'.time().'_'.$extension->getClientOriginalExtension();

        Storage::putFileAs('public/images', $file, $imgName);
        $imgPath = 'images/'.$imgName;
        // dd(Auth::user());
        $user = new User();

        // $user->price = $request->price;
        $user->image = $imgPath;

        $user->save();
        return redirect()->back();
    }
}
