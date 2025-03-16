<?php
// Pivot table model

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Translatable\HasTranslations;

class ProductContentBlock extends Pivot
{
    use HasTranslations;
    protected $table = 'product_content_blocks';

    public $translatable = ['title','description'];

    // public function product(): BelongsTo
    // {
    //     return $this->belongsTo(Product::class,'product_id','id');
    // }

}
