<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|max:20',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // For now, just redirect back with success
        // Later you can add email sending or database storage
        return back()->with('success', 'Thank you! We will contact you soon.');
    }
}
