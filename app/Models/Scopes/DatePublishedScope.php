<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class DatePublishedScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('is_published', true)
            ->where('publish_at', '<=', now())
            ->where(function ($query) {
                $query->where('publish_until', '>=', now())
                    ->orWhereNull('publish_until');
            });
    }
}
