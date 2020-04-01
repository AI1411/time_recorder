<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Attendance extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeTotalSalaryAtThisMonth(Builder $builder)
    {
        $search_month = Request::input('search_month');

        if ($search_month) {
            return $builder->where('start_month', $search_month);
        }
        return $builder;
    }
}
