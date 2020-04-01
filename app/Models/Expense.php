<?php

namespace App\Models;

use App\Cost;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Expense extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTargetMonth(Builder $builder)
    {
        $target_month = Request::input('search_month');
        if ($target_month) {
            return  $builder->where('month', $target_month);
        }
        return $builder;
    }

    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }
}
