<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CategoryType extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'category_types';

    public $translatable = ['title'];

    public function categories()
    {
        return $this->hasMany(Category::class,'id');
    }

}
