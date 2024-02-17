<?php

namespace App\Models;

use App\Enums\MetaTagType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'content',
    ];

    protected $casts = [
        'type' => MetaTagType::class,
    ];
}
