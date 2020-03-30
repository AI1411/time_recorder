<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pref()
    {
        return $this->belongsTo(Pref::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function scopeSearchStore(Builder $builder)
    {
        $search_store = Request::input('search_store');
        if ($search_store) {
            return $builder->where('store_id', $search_store);
        }
        return $builder;
    }

    public function employment_status()
    {
        return $this->belongsTo(EmploymentStatus::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
