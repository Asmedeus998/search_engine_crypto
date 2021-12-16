<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as FacadesHttp;
// use Illuminate\Support\Facedes\Http;

class UserContorller extends Controller
{
    function index()
    {
        // $response = FacadesHttp::get('https://jsonplaceholder.typicode.com/users');
        $response = FacadesHttp::get('https://api.blockchair.com/stats');
        $data = $response->json();

        // dd($data);
        return view('users', ['data' => $data]);
        // return view('users', compact('data'));

    }

    function index2()
    {

        // dd($data);
        return view('update');
        // return view('users', compact('data'));

    }
}
