<?php

namespace App\Http\Controllers;

use App\Models\CardContent;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function showCards()
    {
        $contents = CardContent::all();

        return view('welcome', ['contents' => $contents]);
    }
}
