<?php

namespace App;

use App\Purchase;
use Illuminate\Database\Eloquent\Model;

class Detailpurchase extends Model
{
    public $timestamps = false;

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}
