<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display all services
     */
    public function index()
    {
        $services = Service::active()
            ->ordered()
            ->get();

        return view('frontend.pages.services.index', compact('services'));
    }

    /**
     * Display a single service
     */
    public function show(Service $service)
    {
        // Check if service is active
        if (!$service->is_active) {
            abort(404);
        }

        return view('frontend.pages.services.show', compact('service'));
    }
}
