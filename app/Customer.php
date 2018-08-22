<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function domains(){
        return $this->hasMany(Domains::class);
    }
}