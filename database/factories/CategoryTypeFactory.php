<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryType>
 */
class CategoryTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'title' => json_encode([
                    'tr' => 'Ürün Kategorisi',
                    'en' => 'Product Category',
                ]),
                'key' => 'PRODUCT',
            ],
            [
                'title' => json_encode([
                    'tr' => 'Döküman Kategorisi',
                    'en' => 'Document Category',
                ]),
                'key' => 'DOCUMENT',
            ],
            [
                'title' => json_encode([
                    'tr' => 'Uygulama Tipi Kategorisi',
                    'en' => 'Application Type Category',
                ]),
                'key' => 'APPLICATION',
            ],
        ];
    }
}
