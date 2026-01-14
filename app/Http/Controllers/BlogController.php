<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display all blog posts
     */
    public function index(Request $request)
    {
        $query = BlogPost::published()->with('author')->latest();

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Search functionality
        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('excerpt', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $posts = $query->paginate(12);

        // Get all unique categories
        $categories = BlogPost::published()
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        return view('frontend.pages.blog.index', compact('posts', 'categories'));
    }

    /**
     * Display a single blog post
     */
    public function show(BlogPost $blogPost)
    {
        // Check if post is published
        if (!$blogPost->is_published || !$blogPost->isPublished()) {
            abort(404);
        }

        // Increment views
        $blogPost->incrementViews();

        // Load author relationship
        $blogPost->load('author');

        // Get related posts (same category, exclude current)
        $relatedPosts = BlogPost::published()
            ->where('category', $blogPost->category)
            ->where('id', '!=', $blogPost->id)
            ->take(3)
            ->get();

        return view('frontend.pages.blog.show', compact('blogPost', 'relatedPosts'));
    }
}
