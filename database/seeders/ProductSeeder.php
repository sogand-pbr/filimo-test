<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sourceFilePath = 'public/1.jpg';
        if (!Storage::disk('local')->exists($sourceFilePath)) {
            throw new \Exception("Source file does not exist at path: " . $sourceFilePath);
        }
        $extension = pathinfo(storage_path('app/public/1.jpg'), PATHINFO_EXTENSION);
        $randomize = rand(111111, 999999);
        $destinationDirectory = 'images/';
        $filename = $randomize . '.' . $extension;
        $destinationFilePath = $destinationDirectory . $filename;
        Storage::disk('public')->put($destinationFilePath, Storage::disk('local')->get($sourceFilePath));
        $imageUrl = Storage::url($destinationFilePath);
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < rand(4, 8); $i++) {
                Product::factory()->create([
                    'category_id' => $category->id,
                    'url' => $imageUrl,
                ]);
            }
        }
    }
}

