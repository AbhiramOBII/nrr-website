<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Here you can add email sending logic
        // For now, we'll just redirect back with success message
        // Uncomment below to send email when configured
        
        /*
        Mail::send('emails.contact', $validated, function($message) use ($validated) {
            $message->to('your-email@example.com')
                    ->subject('Contact Form: ' . $validated['subject'])
                    ->replyTo($validated['email'], $validated['name']);
        });
        */

        return redirect()->route('contact')->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
