<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

use Faker\Generator as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $products = config('dataseeder.products');
        // dd($products);
        foreach($products as $product){
            $newproduct = new Product();
            $newproduct->name = $product['name'];
            $newproduct->slug = Str::slug($newproduct->name, '-');
            $newproduct->image = ProductSeeder::storeimage($product['api_featured_image']);
            $newproduct->description = $product['description'];
            $newproduct->quantity = $faker->numberBetween(1, 150);
            $newproduct->price = $product['price'];
            $newproduct->price_sign = $product['price_sign'];
            $newproduct->image_link = $product['image_link'];
            $newproduct->product_link = $product['product_link'];
            $newproduct->website_link = $product['website_link'];
            $newproduct->rating = $product['rating'];
            $newproduct->type_id = $product['category_id'];
            $newproduct->brand_id = $product['brand_id'];
            $newproduct->texture_id = $product['texture_id'];
            $newproduct->save();
        }
    }

    public static function storeimage($img){
        $url = 'https:'.$img;
        $contents = file_get_contents($url);
        $temp_name = substr($url, strrpos($url, '/') + 1);
        $name = substr($temp_name, 0, strpos($temp_name, '?')) .'.jpg';
        $path = 'images/' . $name;
        Storage::put('images/'.$name, $contents);
        return $path;
    }
}
