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

    public function profile()
    {
        $user = Auth::user();
        return view('update', compact('user'));
    }

    public function update(Request $request)
    {
        // $user = User::all();
        $id           = $request->id;
        $old_image    = User::find($id);
        // dd($old_image->image);
        // $image_name = $request->hidden_image;
        $image = $request->file('image');

        if($old_image->image=='images/anonymous.png')
        {
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path('images'), $image_name);
                Storage::putFileAs('public/images', $image, $image_name);
                $img_path = 'images/' . $image_name;
                Storage::delete('public/images/' . $old_image->image);
            }
        }
        else{
            if($image != '')
            {
                $image_name = rand() . '.' . $image->getClientOriginalExtension();
                // $image->move(public_path('images'), $image_name);
                // unlink('images/'.$old_image->avatar);

                Storage::putFileAs('public/images', $image, $image_name);
                $img_path = 'images/' . $image_name;
                Storage::delete('public/images/' . $old_image->image);
            }
        }


        $update = [

            'id'           => $id,
            'image'       => $img_path,
        ];

        User::where('id',$request->id)->update($update);
        return redirect()->back();
        // return view('update', compact('user'));
    }

}
