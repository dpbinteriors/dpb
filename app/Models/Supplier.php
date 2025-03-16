<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Supplier extends Model
{
    use HasFactory;
    use HasTranslations;
    use HasUserStamp;

    public $translatable = ['description'];

    // public function product()
    // {
    //     return $this->belongsTo(Supplier::class);
    // }
}
