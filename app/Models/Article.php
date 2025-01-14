<?php

namespace App\Models;

use App\Filters\Sort;
use App\Filters\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    public function scopeFiltered(Builder $builder): Builder
    {
        //$passable es el argumento que recibe el metodo scopeFiltered
        // customPipeline es el handle que se ejecutara
        $pipeline = app(Pipeline::class)
            ->via('customPipeline')
            ->send($builder)
            ->through([
                Status::class,
                Sort::class
                //thenRturn es el metodo que se ejecutara al final
            ])->thenReturn();
        return $pipeline;

    }
}
