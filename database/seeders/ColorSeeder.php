<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Color;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = config('dataseeder.colors');
        //dd($colors);
        foreach($colors as $color){
            $newcolor = new Color();
            $newcolor->name = $color["colour_name"];
            $newcolor->slug = Str::slug($newcolor->name, '-');
            $newcolor->hex_value = $color["hex_value"];
            $newcolor->save();
        }

    }
}
