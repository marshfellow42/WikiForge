<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link; // Import the Link model
use App\Models\Page;

class MarkdownController extends Controller
{
    public function show($slug) // Accept the slug parameter
    {
        // Find the link based on the slug
        $link = Page::where('slug', $slug)->first();

        // If the slug is not found, return a 404 error
        if (!$link) {
            abort(404);
        }

        // Pass the link data to the view
        return view('wiki.markdown', ['link' => $link]);
    }
}
