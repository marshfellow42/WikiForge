<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WikiController extends Controller
{
    public function create(){
        $users = User::all();
        return view('wiki.creator', compact('users'));
    }
}
