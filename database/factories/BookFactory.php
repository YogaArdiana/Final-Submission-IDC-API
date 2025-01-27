<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $author = Author::inRandomOrder()->first(); 
        $category = Category::inRandomOrder()->first(); 
        return [
            'title' => $this->faker->sentence,  
            'description' => $this->faker->paragraph,  
            'author_id' => $author->id,  
            'category_id' => $category->id,  
        ];
    }
}
