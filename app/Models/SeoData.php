<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SeoData extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'header',
        'canonical',
        'keywords',
        'description',
        'noindex',
        'nofollow',
        'text_before',
        'text_after',
        'og_off',
        'og_title',
        'og_type',
        'og_url',
        'og_image',
        'og_description',
        'og_site_name',
    ];

    protected $casts = [
        'noindex' => 'boolean',
        'nofollow' => 'boolean',
        'og_off' => 'boolean',
    ];

    public function seoable(): MorphTo
    {
        return $this->morphTo();
    }
}
