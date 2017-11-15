<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function postTest()
    {
    }

    // public function show()
    // {
    //     return 'salut getindex';
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($name)
    public function index()
    {
        // return "salut $name";
        return view('home');
    }
}
