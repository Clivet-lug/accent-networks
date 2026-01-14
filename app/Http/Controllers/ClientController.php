<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Testimonial;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::active()->ordered()->get();
        $testimonials = Testimonial::published()->ordered()->get();

        return view('frontend.pages.clients', compact('clients', 'testimonials'));
    }
}
