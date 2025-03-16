<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasTimeStamp;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
    use HasUrlField;

    public $urlField = 'title';

    public $translatable = ['title', 'slug', 'caption', 'description'];

    /**
     * Get the category that owns the project.
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
