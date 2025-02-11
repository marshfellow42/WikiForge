<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function store(Request $request)
    {
        Log::info('Request Data:', $request->all());

        // Check if content is actually being received
        if (!$request->has('content') || empty($request->content)) {
            Log::error('Content is missing!');
            return redirect()->back()->withErrors(['error' => 'Content field is empty!']);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'content' => 'required|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = null;
        if ($request->hasFile('main_image')) {
            $imagePath = $request->file('main_image')->store('storage', 'public');
        }

        Page::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'subtitle' => $request->subtitle,
            'markdown' => $request->content,
            'image' => $imagePath,
        ]);

        Log::info('Page saved successfully!');

        return redirect('/wiki/creator')->with('success', 'Página criada com sucesso!');    
    }
}
