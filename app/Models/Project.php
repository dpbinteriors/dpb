<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasTimeStamp;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
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

    public $translatable = ['title', 'caption', 'description', 'slug', 'location', 'proje_categorisi'];

    /**
     * Get the category that owns the project.
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function contentBlocks(){
        return $this->hasMany(ProjectContentBlock::class);
    }

    public function orderedContentBlocks()
    {
        return $this->hasMany(ProjectContentBlock::class)->orderBy('order', 'asc');
    }
}
