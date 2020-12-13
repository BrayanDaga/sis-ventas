<?php

namespace App;

use App\Product;
use App\Scopes\ProviderScope;

class Provider extends Person
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ProviderScope);
    }
}
