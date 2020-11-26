<?php

namespace App;

use App\Provider;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'provider_id');
    }

    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
    // }

}
