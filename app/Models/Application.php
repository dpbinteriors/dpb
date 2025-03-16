<?php

namespace App\Models;

use App\Traits\HasTimeStamp;
use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Application extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
//    use HasTranslatableSlug;
    use HasUrlField;

    public $urlField = 'title';
    protected $casts = [
        'image_gallery' => 'array',
    ];

    public $translatable = ['title', 'caption', 'description', 'slug'];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class,'product_application');
    // }

    public function productApplication()
    {
        return $this->hasMany(ProductApplication::class);
    }
}
