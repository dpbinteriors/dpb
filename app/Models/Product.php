<?php

namespace App\Models;

use App\Traits\HasTimeStamp;
use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasUrlField;
    use HasTimeStamp;


    public $urlField = 'title';
    protected $casts = [
        'image_gallery' => 'array',
    ];

    public $translatable = ['title', 'caption', 'description', 'slug','product_content_blocks.title'];

    // Relations

    //supplier
    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class);
    // }
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }


    // public function applications()
    // {
    //     return $this->belongsToMany(Application::class,'product_application')->withPivot('description','position')->orderBy('position','asc');
    // }

    // public function productCategory()
    // {
    //     $categoryType = CategoryType::where('key', 'PRODUCT')->first();
    //     return $this->belongsTo(Category::class)->where('category_type_id', $categoryType->id ?? 0);
    // }

    // public function productApplication()
    // {
    //     return $this->hasMany(ProductApplication::class);
    // }

    // public function productApplications()
    // {
    //     return $this->hasMany(ProductApplication::class);
    // }

    // public function productContentBlocks()
    // {
    //     return $this->hasMany(ProductContentBlock::class,);
    // }

    // public function certificates()
    // {
    //     return $this->belongsToMany(Certificate::class,'product_certificate','product_id','certificate_id');
    // }

    // // Documents
    // public function documents()
    // {
    //     return $this->belongsToMany(Document::class,'product_document')->orderBy('position','asc');
    // }
}
