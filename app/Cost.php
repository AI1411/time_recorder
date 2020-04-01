<?php

namespace App;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
