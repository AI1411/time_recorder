<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function prefs()
    {
        return $this->hasMany(Pref::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
