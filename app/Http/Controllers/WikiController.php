<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WikiController extends Controller
{
    public function create(){
        return view('wiki.creator');
    }
}
