<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jet extends Model
{
    protected $fillable = ['name', 'model', 'capacity', 'hourly_rate'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('model', 'like', "%{$search}%");
    }

    public function approvedReviews()
    {
        return $this->hasMany(Review::class)->where('status', 'approved');
    }
}
