<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Illuminate\Illuminate\Support\Facades\Facade;

class ContactController extends Controller
{
    //

    function index(Request $request)
    {
        return view('/contact');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'contact' => 'required|digits:10'
        ]);
        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->contact = $request->contact;
        $contact->save();
        return view('/contact');
    }
}
