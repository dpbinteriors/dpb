<?php
// Pivot table model

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Translatable\HasTranslations;

class ProductApplication extends Pivot
{
    use HasTranslations;
    protected $table = 'product_application';

    public $translatable = ['description'];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class,'application_id','id');
    }

    /**
     * @return BelongsTo
     */
    // public function product(): BelongsTo
    // {
    //     return $this->belongsTo(Product::class,'product_id','id');
    // }
}
