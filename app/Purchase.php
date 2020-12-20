<?php

namespace App;

use App\User;
use App\Provider;
use App\Detailpurchase;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [
        'provider_id',
        'user_id' ,
        'iva',
        'type_vou',
        'total',
    ];

    // protected $with = [
    //     'detailsPurchases',
    // ];

    public function detailsPurchases()
    {
        return $this->hasMany(Detailpurchase::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
