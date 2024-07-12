<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

trait HasSchemalessAttributes
{
    public function initializeHasSchemalessAttributes()
    {
        $this->casts['attributes'] = SchemalessAttributes::class;
    }

    public function scopeWithAttributes(Builder $query, string $attributeName, $value): Builder
    {
        return $query->where("attributes->$attributeName", $value);
    }
}
