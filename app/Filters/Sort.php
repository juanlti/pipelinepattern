<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;


final class Sort extends QueryFilter
{
    protected function apply(Builder $builder): Builder
    {
        return $builder->orderBy("id", request()->query($this->filterName()));
    }

    protected function filterName(): string
    {
        return "sort";
    }
}
