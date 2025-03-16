<?php

namespace App\Models;

use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Banner extends Model
{
    use HasTranslations;
    use HasUserStamp;
    use HasFactory; // Eğer kullanıyorsanız ekleyin

    protected $table = 'banners';

    protected $translatable = ['title', 'caption', 'button_text', 'button_url'];

    protected static function booted()
    {
        static::creating(function ($banner) {
            $maxSort = self::max('sort');

            $banner->sort = $maxSort ? $maxSort + 1 : 1;
        });
    }
}
