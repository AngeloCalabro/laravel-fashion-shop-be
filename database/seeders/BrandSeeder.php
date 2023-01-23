<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Brand;


class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = config('dataseeder.brands');;
        // dd($brands);
        foreach($brands as $brand){
            $newbrand = new Brand();
            $newbrand->name = $brand;
            $newbrand->slug = Str::slug($newbrand->name, '-');
            // $newbrand->name = $brand;
            $newbrand->save();
        }
    }
}
