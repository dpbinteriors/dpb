<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasUrlField;

    public $urlField = 'title';
    public $translatable = ['title', 'caption','description','slug'];

    protected $casts = [
        'image_gallery' => 'array',
    ];

    // sub categories
    public function connectedCategories()
    {
        return $this->hasMany(Category::class,'connected_category_id')->where('is_published',true)->orderBy('position', 'asc');
    }

    public function connectedCategory()
    {
        return $this->belongsTo(Category::class, 'connected_category_id');
    }

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class, 'category_type_id');
    }

    // get related documents
    public function documents()
    {
        return $this->hasMany(Document::class)->orderBy('position', 'asc');
    }

    // get related products
    // public function products()
    // {
    //     return $this->hasMany(Product::class)->orderBy('position', 'asc');
    // }

    // get related posts
    public function applications()
    {
        return $this->hasMany(Application::class)->orderBy('position', 'asc');
    }

    public function scopePublishedProductCategory(Builder $query, $category,$connectedCategoryId = null): Builder
    {
        $categoryType = CategoryType::where('key', 'PRODUCT')->firstOrFail();

        return $query->where('slug->' . app()->getLocale(), $category)
            ->where('category_type_id', $categoryType->id)
            ->where('is_published', true)
            ->where('connected_category_id', $connectedCategoryId);
    }

}
