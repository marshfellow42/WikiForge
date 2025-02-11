<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(4); // Generate a fake title

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence, // Generate a short subtitle
            'slug' => Str::slug($title), // Generate a slug from the title
            'main_image' => $this->faker->imageUrl(640, 480, 'abstract'), // Generate a placeholder image URL
            'markdown' => $this->faker->paragraph, // Generate multi-paragraph markdown content
        ];
    }
}
