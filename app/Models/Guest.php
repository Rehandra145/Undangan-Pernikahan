<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Guest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($guest) {
            $baseSlug = Str::slug($guest->name);
            $count = Guest::where('slug', 'like', "{$baseSlug}%")->count();
            $guest->slug = $count ? "{$baseSlug}-" . ($count + 1) : $baseSlug;
        });
    }

}
