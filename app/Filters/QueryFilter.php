<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Closure;

// es una clase abstracta, esta clase puede ser utilizada por otras clases y no necesita ser instanciada
abstract class QueryFilter
{
    public function customPipeline(Builder $builder, Closure $next): Builder
    {
        //el metodo handle se ejecuta de manera automatica
        // tenemos 2 procesos que deben ser ejecutados en diferentes orden:
        //1) filtrar por status
        //2)  ordenar por id

        if ( ! request()->query($this->filterName())) {

            return $next($builder);
        }

        return $next($this->apply($builder));
    }

    abstract protected function apply(Builder $builder): Builder;

    abstract protected function filterName(): string;
}
