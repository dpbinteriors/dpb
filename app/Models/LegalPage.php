<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class LegalPage extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUrlField;
    use HasUserStamp;

    public $urlField = 'title';

    public $translatable = ['title', 'description','slug'];

}
