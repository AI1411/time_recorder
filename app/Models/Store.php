<?php

namespace App\Models;

use http\Client\Request;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeStoreSearch($query)
    {
        $search_store_target = \request()->input('search_store');
        return $query->where('id', $search_store_target);
    }
}
