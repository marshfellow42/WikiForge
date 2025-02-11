<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class MarkdownController extends Controller
{
    public function show($slug)
    {
        // Ensure login and register are handled by their dedicated routes
        if (in_array($slug, ['login', 'register'])) {
            abort(404); // Prevent Markdown processing and let Laravel handle them separately
        }

        // Find the link based on the slug
        $link = Page::where('slug', $slug)->first();

        // If the slug is not found, return a 404 error
        if (!$link) {
            abort(404);
        }

        // Pass the link data to the view for Markdown processing
        return view('wiki.markdown', ['link' => $link]);
    }
}
