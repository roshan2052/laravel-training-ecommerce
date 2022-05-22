<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FilterDataTrait
{
    protected static function booted()
    {
        static::addGlobalScope('FilterById', function (Builder $builder) {
            $builder->where('id', '>', 5);
        });
    }


}
