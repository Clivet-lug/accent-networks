<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display all projects
     */
    public function index(Request $request)
    {
        $query = Project::published()->with('category');

        // Filter by category if provided
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $projects = $query->ordered()->paginate(12);

        // Get all categories for filter
        $categories = Category::active()->ordered()->get();

        return view('frontend.pages.projects.index', compact('projects', 'categories'));
    }

    /**
     * Display a single project
     */
    public function show(Project $project)
    {
        // Check if project is published
        if (!$project->is_published) {
            abort(404);
        }

        // Load the category relationship
        $project->load('category');

        return view('frontend.pages.projects.show', compact('project'));
    }
}
