<?php

namespace App\Models;

use App\Models\Scopes\DatePublishedScope;
use App\Traits\HasTimeStamp;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Document extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
    use Searchable;

    protected $with = ['files'];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new DatePublishedScope());
    }

    public $translatable = ['title', 'caption', 'description', 'slug'];

    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->hasMany(DocumentFile::class);
    }

    //Products
    // public function products()
    // {
    //     return $this->belongsToMany(Product::class, 'document_product')->orderBy('position', 'asc');
    // }

    public function shouldBeSearchable()
    {
        return $this->published();
    }

}
