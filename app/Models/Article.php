<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    public function scopeFiltered(Builder $builder):Builder{
        return $builder
        ->when(request('search'),function($query){
            $query->where('title','like','%'.request('search').'%')
                ->orWhere('body','like','%'.request('search').'%');
        });
    }
}
