<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use App\Traits\HasTimeStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Article extends Model
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

    public $translatable = ['title', 'caption', 'description', 'slug'];


}
