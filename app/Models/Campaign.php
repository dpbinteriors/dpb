<?php

namespace App\Models;

use App\Traits\HasTimeStamp;
use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Campaign extends Model
{
    use HasTranslations;
    use HasUserStamp;
    use HasTimeStamp;
    use HasUrlField;
    use HasFactory;

    public $translatable = ['title', 'description', 'button_text','slug'];
}
