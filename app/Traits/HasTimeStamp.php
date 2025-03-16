<?php

namespace App\Traits;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;

trait HasTimeStamp
{
    public static function timeStampFields(): array
    {
        return [
            Toggle::make('is_published')
                ->label(__('panel.is_published'))
                ->default(true)
                ->columnSpan(12),
            DateTimePicker::make('publish_at')
                ->default(now())
                ->required()
                ->label(__('panel.publish_at'))
                ->columnSpan(12),
            DateTimePicker::make('publish_until')
                ->label(__('panel.publish_until'))
                ->columnSpan(12)
        ];
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('publish_at', '<=', now())
            ->where(function ($query) {
                $query->where('publish_until', '>=', now())
                    ->orWhereNull('publish_until');
            });
    }
}
