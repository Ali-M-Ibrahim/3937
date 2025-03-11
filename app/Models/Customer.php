<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function getCredentials(){
        return $this->hasOne(Credential::class);
    }

    public function getAddresses(){
        return $this->hasMany(Address::class);
    }

    public function getServices(){
        return $this->belongsToMany(
            Service::class,
            "service_customers",
            "customer_id",
            "service_id"
        );
    }
}
