<?php

namespace App\Models;

use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DocumentFile extends Model
{
    use HasUserStamp;

    // Category
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
