<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        $imageFiles = Storage::disk('public')->files('books');
        $randomImage = $this->faker->randomElement($imageFiles);

        return [
            'title' => $this->faker->unique()->sentence,
            'author' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'image' => $randomImage ? 'books/' . $randomImage : null,
            'is_available' => $this->faker->boolean(80),
        ];
    }
}
