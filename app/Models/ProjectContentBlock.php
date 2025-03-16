<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use App\Traits\HasTimeStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectContentBlock extends Model
{
    use HasTranslations;
    use HasTimeStamp;

    protected $casts = [
        'image_gallery' => 'array',
    ];

    public $translatable = ['title', 'description','button_text'];

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
