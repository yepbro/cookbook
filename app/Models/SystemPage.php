<?php

namespace App\Models;

use App\Enums\SystemPage as SystemPageEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class SystemPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function scopeSlug(Builder $query, SystemPageEnum|string $slug): void
    {
        $query->where('slug', '=', $slug instanceof \App\Enums\SystemPage ? $slug->value : $slug);
    }

    public function seo(): MorphOne
    {
        return $this->morphOne(SeoData::class, 'seoable');
    }
}
