<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = config('dataseeder.tags');
        // dd($tag);
        foreach($tags as $tag){
            $newtag = new Tag();
            $newtag->name = $tag;
            $newtag->slug = Str::slug($newtag->name, '-');
            $newtag->save();
        }
    }
}
