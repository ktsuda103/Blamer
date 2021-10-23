<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('contact/index',compact('user'));
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
