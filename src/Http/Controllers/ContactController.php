<?php

namespace golpik\contact\Http\Controllers;

use App\Http\Controllers\Controller;
use golpik\contact\models\Contact;
use Illuminate\Http\Request;
use Validator;
use golpik\contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        return view('contact::contact');
    }
    

    public function send(Request $request) {
        
        // $request->validate([
        //         'name' => 'required',
        //         'email' => 'required|min:5',
        //         'phone' => 'required|email',
        //         'message' => 'required|min:5'
        //     ], [
        //         'name.required' => 'Name is required',
        //         'message.required' => 'Message is required'
        //     ]);

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|min:4|max:255',
        //     'email' => 'required|email',
        //     'phone' => 'required|min:6|max:15',
        //     'message' => 'required'
        // ]);

        Mail::to(config('contact.admin_email'))->send(new ContactMailable($request->message, $request->name));

        Contact::create($request->all());

        return back()->with('success', 'User created successfully.');
        
    }
    
}
