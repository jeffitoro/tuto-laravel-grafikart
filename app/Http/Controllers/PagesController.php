<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function about()
    {
        $title ="à-propos <p>p</p>";
        return view("pages/about", ['title'=>$title] );
    }

    public function contact(\Illuminate\Mail\Mailer $email)
    {
        $me = 'jeff-oro@hotmail.com';
        // die(public_path());
        $email->send(
            ['emails.contact', 'emails.contact-text'],
            ['username' => 'test'],
            function ($message) use ($me) {
        // Mail::send(['emails.contact', 'emails.contact-text'], ['username'=>'test'], function ($message) {
                $message->to($me);
                $message->attach('large.png');
            });
    }
}
