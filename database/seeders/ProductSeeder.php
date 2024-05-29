<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sourceFilePath = storage_path('app/public/1.jpg');
        $extension = pathinfo($sourceFilePath, PATHINFO_EXTENSION);
        $randomize = rand(111111, 999999);
        $destinationDirectory = 'images/';
        $filename = $randomize . '.' . $extension;
        $destinationFilePath = $destinationDirectory . $filename;
        Storage::disk('public')->move($sourceFilePath, $destinationFilePath);
        $imageUrl = Storage::url($destinationFilePath);
        $category = Category::all();
        foreach ($category as $item) {
            for ($i = 0; $i < rand(4, 8); $i++) {
                Product::factory()->create([
                    'category_id' => $item->id,
                    'url' => url('/') . $imageUrl
                ]);
            }
        }
    }
}
