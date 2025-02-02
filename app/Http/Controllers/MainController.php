<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function check()
    {
        $users = User::all();

        /*
        if ($users->isEmpty()) { // Use isEmpty() instead of checking for null
            return view('wiki.create_admin'); // Remove the extra `/`
        } else {
            return view('main'); // Ensure 'main' exists in your views
        }
        */
        return view('main');
    }
}

