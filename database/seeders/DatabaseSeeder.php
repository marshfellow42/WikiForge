<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an admin user with specific attributes
        User::factory()->create([
            'name' => 'Admin',
            'nickname' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('adminadmin'), // Always hash the password
            'role' => 'admin',
            'profile_picture' => '<x-bi-person-fill class="text-dark" />',
        ]);

        // Create a page with specific title, slug, and markdown content
        Page::factory()->create([
            'title' => 'Example Page',
            'slug' => 'example-page',
            'markdown' => '# Example Page

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut laoreet mattis dui pulvinar lacinia. Donec auctor tincidunt lacus quis tincidunt. Sed sit amet mi ut massa condimentum molestie eget non nisl. Nunc ullamcorper nec augue sed pharetra. Nam hendrerit eleifend finibus. Nunc iaculis tortor sed euismod pretium. Mauris id sapien malesuada, facilisis nibh sit amet, efficitur diam.

<img src="https://www.w3schools.com/images/lamp.jpg" alt="Lamp" width="32" height="32" style="text-align:center">',
        ]);
    }
}
