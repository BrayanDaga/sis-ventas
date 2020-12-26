<?php

namespace App;

use App\Product;
use App\Scopes\ProviderScope;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Person
{
    use SoftDeletes;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ProviderScope);
    }
}
