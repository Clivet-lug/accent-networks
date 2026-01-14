<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use App\Models\Testimonial;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage
     */
    public function index()
    {
        // Get hero section for home page
        $hero = HeroSection::where('page', 'home')
            ->where('is_active', true)
            ->first();

        // Get active services (limit to 3 for homepage)
        $services = Service::active()
            ->ordered()
            ->take(3)
            ->get();

        // Get featured projects (limit to 3)
        $projects = Project::published()
            ->featured()
            ->ordered()
            ->take(3)
            ->get();

        // Get featured and active clients
        $clients = Client::active()
            ->featured()
            ->ordered()
            ->get();

        // Get featured testimonials (limit to 3)
        $testimonials = Testimonial::published()
            ->featured()
            ->ordered()
            ->take(3)
            ->get();

        return view('frontend.pages.home', compact(
            'hero',
            'services',
            'projects',
            'clients',
            'testimonials'
        ));
    }
}
