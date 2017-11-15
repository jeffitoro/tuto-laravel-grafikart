<?php

namespace App\Http\Controllers;

// use \Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Link;
use \Illuminate\Support\Facades\Input;

class LinksController extends Controller
{

    public function show($id)
    {
        $link =Link::findOrFail($id);
        // return new RedirectResponse($link->url, 301);
        return redirect($link->url, 301);
    }

    public function create()
    {
        return view("links.create");
    }

    public function store()
    {
        $url = Input::get('url');
        // $link = Link::where('url', $url) -> first();
        // if (!$link) {
        //     $link = Link::create(['url'=>$url]);
        // }
        $link =Link::firstOrCreate(['url'=>$url]);
        return view('links.succes', compact('link'));
    }
}
