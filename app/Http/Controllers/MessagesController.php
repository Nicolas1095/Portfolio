<?php

namespace App\Http\Controllers;

use App\Mail\MessageEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $message = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:20',
        ]);
        $subject = $request->subject;
        $email = $request->email;
        $name = $request->name;
        Mail::to("nicolasgalarraga1095@gmail.com")->queue(New MessageEmail($message, $email, $name, $subject));
        return back()->with('status', 'Message Received, soon you will receive an answer');
    }
}
