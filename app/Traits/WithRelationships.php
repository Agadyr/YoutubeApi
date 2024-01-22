<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait WithRelationships{

    public function scopeWithRelationships($query, array|string $relationships)
    {
        $validrelationships = collect($relationships)
            ->map(fn(string $relationships):array => explode('.',$relationships))
            ->filter(fn(array $relationships):bool => in_array($relationships[0],static::$relationships))
            ->map(fn(array $relationships):string => implode('.',$relationships))
            ->all();

        return $query->with($validrelationships);
    }
}
