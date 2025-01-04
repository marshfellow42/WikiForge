<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    public function showPages()
    {
        // Retrieve all pages from the database
        $pages = Page::all();

        // Pass the pages data to the welcome view
        return view('welcome', compact('pages'));
    }
}
