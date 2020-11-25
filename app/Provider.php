<?php

namespace App;

use App\Scopes\ProviderScope;
use App\Transformers\SellerTransformer;

class Provider extends Person
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ProviderScope);
    }
}
