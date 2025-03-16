<?php

namespace App\Models;

use App\Traits\HasUrlField;
use App\Traits\HasUserStamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Certificate extends Model
{
    use HasFactory;
    use HasUserStamp;

    protected $casts = [
        'image_gallery' => 'array',
    ];

    // public function products()
    // {
    //     return $this->belongsToMany(Product::class,'product_certificate','certificate_id','product_id');
    // }

}
