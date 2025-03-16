<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasTimeStamp;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WorksCategories extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
    use HasUrlField;

    public $urlField = 'title';

    public $translatable = ['title', 'slug', 'caption'];

    /**
     * Get the category that owns the project.
     */
    public function works()
    {
        return $this->hasMany(Works::class, 'category_id');
    }
}
