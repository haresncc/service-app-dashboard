<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class City extends Model
{
    use HasFactory, HasSlug;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'city_id');
    }

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'district_id',
        'latitude',
        'longitude',
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
        if (isset($filters['district_id'])) {
            $builder->where('district_id', $filters['district_id']);
        };
    }
}
