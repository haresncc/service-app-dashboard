<?php

namespace App\Models;

use App\Models\District;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Governorate extends Model
{
    use HasFactory, HasSlug;

    public function districts()
    {
        return $this->hasMany(District::class, 'governorate_id');
    }

    protected $fillable = [
        'name',
        'name_en',
        'slug',
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
    }
}
