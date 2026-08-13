<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasUuids, HasSlug;

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected $primaryKey = 'uuid';

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'image',
        'image2',
        'image3',
        'phone_number',
        'phone_number2',
        'information',
        'information_en',
        'sub_category_id',
        'city_id',
        'latitude',
        'longitude',
        'coordinates',
        'confirmed',
    ];

    public function getNameAttribute($value)
    {
        $lang = request('lang', 'ar');
        if ($lang === 'en' && $this->name_en) {
            return $this->name_en;
        }
        return $value;
    }

    public function getInformationAttribute($value)
    {
        $lang = request('lang', 'ar');
        if ($lang === 'en' && $this->information_en) {
            return $this->information_en;
        }
        return $value;
    }

    public function scopeFilter(Builder $builder, array $filters)
    {
        if (isset($filters['search'])) {
            $builder->where('name', 'LIKE', "%{$filters['search']}%");
        };
        if (isset($filters['name'])) {
            $builder->where('name', 'LIKE', "%{$filters['name']}%");
        };
        if (isset($filters['sub_category_id'])) {
            $builder->where('sub_category_id', $filters['sub_category_id']);
        };
        if (isset($filters['city_id'])) {
            $builder->where('city_id', $filters['city_id']);
        };
        if (isset($filters['category_id'])) {
            $builder->whereHas('subCategory', function ($q) use ($filters) {
                $q->where('category_id', $filters['category_id']);
            });
        };
        if (isset($filters['district_id'])) {
            $builder->whereHas('city', function ($q) use ($filters) {
                $q->where('district_id', $filters['district_id']);
            });
        };
        if (isset($filters['governorate_id'])) {
            $builder->whereHas('city.district', function ($q) use ($filters) {
                $q->where('governorate_id', $filters['governorate_id']);
            });
        };
    }

    // Cast the JSON column to a PHP array automatically
    protected $casts = [
        'information' => 'array',
    ];

    /**
     * Scope to find records within a specific kilometer radius.
     * MySQL expects WKT syntax: POINT(longitude latitude)
     */
    public function scopeWithinRadius(Builder $query, float $latitude, float $longitude, float $radiusInKm): Builder
    {
        return $query->whereRaw(
            "ST_Distance_Sphere(coordinates, ST_GeomFromText(?, 4326)) <= ?",
            ["POINT({$longitude} {$latitude})", $radiusInKm * 1000] // convert km to meters
        );
    }

    protected $hidden = ['coordinates'];
}
