<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class WikiController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Check if the user is authenticated and has 'admin' role
            if (Auth::check() && Auth::user()->role == 'admin') {
                return $next($request);
            } else {
                // If the user is not an admin, redirect with an error
                return redirect('/')->with('error', 'Você não tem autorização para essa página');
            }
        });
    }
    */

    public function create()
    {
        $pages = Page::all();
        return view('wiki.creator', compact('pages'));
    }

    public function show()
    {
        $user = Auth::user(); // Get the authenticated user
        $users = User::all();

        if ($user && $user->role == "admin") {
            return view('wiki.info', compact('users'));
        } else {
            return redirect('/')->with('error', 'Access denied.');
        }
    }

    public function observe()
    {
        $users = User::all();
        return view('wiki.users', compact('users'));
    }

    public function create_new_page()
    {
        $pages = Page::all();
        return view('wiki.creator.create_page', compact('pages'));
    }
}
