<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Save to the database
        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title), // Generate a URL-friendly slug
            'markdown' => $request->content, // Save markdown content
        ]);

        // Redirect back to /wiki/creator with a success message
        return redirect('/wiki/creator')->with('success', 'Página criada com sucesso!');
    }
}
