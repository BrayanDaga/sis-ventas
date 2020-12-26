<?php

namespace App;

use App\Category;
use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'person_id',
        'category_id',
        'title',
        'description',
        'price',
        'image',
        'stock',
        'status'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class,'person_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
