<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // For password hashing

class SetupController extends Controller
{
    public function step1()
    {
        return view('wiki.setup.step1');
    }

    public function handleStep1(Request $request)
    {
        $validated = $request->validate([
            'wikiName' => 'required|string|max:255',
        ]);

        // Store the wiki name in the configurations table
        Configuration::create([
            'key' => 'wiki_name',
            'value' => $validated['wikiName'],
        ]);

        return redirect()->route('setup.step2');
    }

    public function step2()
    {
        return view('wiki.setup.step2');
    }

    public function handleStep2(Request $request)
    {
        $validated = $request->validate([
            'language' => 'required|string',
        ]);

        // Store the language in the configurations table
        Configuration::create([
            'key' => 'language',
            'value' => $validated['language'],
        ]);

        return redirect()->route('setup.step3');
    }

    public function step3()
    {
        return view('wiki.setup.step3');
    }

    public function handleStep3(Request $request)
    {
        $validated = $request->validate([
            'adminEmail' => 'required|email',
        ]);

        // Store the admin email in the configurations table
        Configuration::create([
            'key' => 'admin_email',
            'value' => $validated['adminEmail'],
        ]);

        return redirect()->route('setup.step4');
    }

    public function step4()
    {
        return view('wiki.setup.step4');
    }

    public function handleStep4(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the admin email from the configurations table
        $adminEmail = Configuration::where('key', 'admin_email')->first()->value;

        // Create the admin user in the users table
        $user = User::create([
            'name' => 'Admin',
            'nickname' => 'admin', // Or generate a unique nickname
            'email' => $adminEmail,
            'password' => Hash::make($validated['password']),
            'role' => 'admin', // Admin role
        ]);

        // Optionally, store the password and other user info in the configurations table as well
        Configuration::create([
            'key' => 'admin_user_id',
            'value' => $user->id,
        ]);

        // Redirect to the setup completion page
        return redirect()->route('setup.complete');
    }

    public function complete()
    {
        return view('wiki.setup.complete');
    }
}
