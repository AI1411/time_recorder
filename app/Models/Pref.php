<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
