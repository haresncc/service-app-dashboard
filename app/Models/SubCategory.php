<?php

namespace App\Models;

use App\Models\Service;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SubCategory extends Model
{
    use HasFactory, HasSlug;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'sub_category_id');
    }

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'image',
        'category_id',
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
        if (isset($filters['category_id'])) {
            $builder->where('category_id', $filters['category_id']);
        };
    }
}
