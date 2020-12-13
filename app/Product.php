<?php

namespace App;

use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function provider()
    {
        return $this->belongsTo(Provider::class,'person_id');
    }
}
