<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactNotification;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function about()
    {
        return view('about');
    }
    public function services()
    {
        return view('services');
    }
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle the contact form submission.
     */
    public function submitContact(ContactFormRequest $request)
    {
        try {
            // Save contact to database
            $contact = Contact::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Send notification email to admin
            Mail::to('aidigitalagency08@gmail.com')->send(new ContactNotification($contact));

            return redirect()
                ->back()
                ->with('success', 'Thank you for contacting us! We\'ll get back to you soon.');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Sorry, something went wrong. Please try again.');
        }
    }
}
