<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Texture;


class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textures = config('dataseeder.textures');;
        // dd($textures);
        foreach($textures as $texture){
            $newtexture = new Texture();
            $newtexture->name = $texture;
            $newtexture->slug = Str::slug($newtexture->name, '-');
            $newtexture->save();
        }
    }
}
