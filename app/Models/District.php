<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class District extends Model
{
    use HasFactory, HasSlug;

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'district_id');
    }

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'governorate_id'
    ];

    public function getNameAttribute($value)
    {
        $lang = request('lang', 'ar');
        if ($lang === 'en' && $this->name_en) {
            return $this->name_en;
        }
        return $value;
    }

    public function scopeFilter(Builder $builder, $filters)
    {
        if (isset($filters['name'])) {
            $builder->where('name', 'LIKE', "%{$filters['name']}%");
        };
        if (isset($filters['governorate_id'])) {
            $builder->where('governorate_id', $filters['governorate_id']);
        };
    }
}
