<?php

namespace Database\Seeders;

use App\Models\CategoryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryTypes = [
            [
                'title' => [
                    'tr' => 'Ürün Kategorisi',
                    'en' => 'Product Category',
                ],
                'key' => 'PRODUCT',
            ],
            [
                'title' => [
                    'tr' => 'Döküman Kategorisi',
                    'en' => 'Document Category',
                ],
                'key' => 'DOCUMENT',
            ],
            [
                'title' => [
                    'tr' => 'Uygulama Tipi Kategorisi',
                    'en' => 'Application Type Category',
                ],
                'key' => 'APPLICATION',
            ]
        ];

        // Insert data to table

        foreach ($categoryTypes as $categoryType) {
            CategoryType::create($categoryType);
        }
    }
    //php artisan db:seed --class=ProductSeeder
}
