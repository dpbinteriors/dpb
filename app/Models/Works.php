<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasTimeStamp;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Works extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
    use HasUrlField;

    public $urlField = 'title';
    protected $casts = [
        'gallery' => 'array',
    ];

    public $translatable = ['title', 'caption', 'description', 'slug', 'style', 'tag', 'work-categories'];

    /**
     * Get the category that owns the project.
     */
    public function category()
    {
        return $this->belongsTo(WorksCategories::class, 'category_id');
    }

}


