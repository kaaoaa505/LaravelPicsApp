<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::makeDayDirectory();

        $images = Storage::allFiles('images');

        foreach ($images as $image) {
            if (in_array(Image::getType($image), Image::allowedImageTypes())) {
                Image::factory()->create([
                    'file' => $image,
                    'dimension' => Image::getDimensions($image)
                ]);
            }
        }

        // Image::factory(10)->create();
    }
}
