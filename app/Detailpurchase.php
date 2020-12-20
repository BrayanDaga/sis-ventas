<?php

namespace App;

use App\Purchase;
use Illuminate\Database\Eloquent\Model;

class Detailpurchase extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'purchase_id',
        'product_id',
        'quantity',
        'price',
        'subtotal'
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
