<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentStatus extends Model
{
    public function uses()
    {
        return $this->hasMany(User::class);
    }
}
