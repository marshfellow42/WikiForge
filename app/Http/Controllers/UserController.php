<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile ($nickname = 'Kelwinkxps13') {

        return view('profile.user-profile', ['nickname' => $nickname]);
    }
}
