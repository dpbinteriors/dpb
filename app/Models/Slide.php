<?php

namespace App\Models;

use App\Traits\HasTimeStamp;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Slide extends Model
{
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
    use HasFactory;

    public $translatable = ['title', 'description','slogan','type'];
}
