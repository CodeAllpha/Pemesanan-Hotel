<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('pages.user.contact');

    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg,
        ];

        Mail::to('ganyuhotel@gmail.com')->send(
            new ContactMail($details)
        );
        return back()->with('success','Your Meesage has been send successfully');
        


    }
}
