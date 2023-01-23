<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];
    public static function generateSlug($name)
    {
        return Str::slug($name, '-');
    }

    public function brands():HasMany{
        return $this->hasMany(Brand::class);
    }
}
