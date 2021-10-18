<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact/index');
    }

    public function confirm(ContactFormRequest $request)
    {
        $contact = $request->all();
        return view('contact/confirm',compact('contact'));
    }

    public function send(ContactFormRequest $request)
    {
        $contact = $request->all();
        \Mail::to('k.tsuda.103@gmail.com')->send(new ContactSendmail($contact));
        $request->session()->regenerateToken();
        return view('contact/send');    
    }
}
