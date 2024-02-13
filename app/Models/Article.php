<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Article extends Model implements Feedable, Sitemapable
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'author_id',
        'heading',
        'slug',
        'content',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', '=', true);
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->heading)
            ->summary(Str::of($this->content)->stripTags()->limit(300))
            ->updated($this->updated_at)
            ->link(route('pages.items.show', $this))
            ->authorName('Denis')
            ->authorEmail('denis@yepbro.ru');
    }

    public static function getFeedItems(): Collection
    {
        return Article::published()->latest('id')->limit(10)->get();
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('pages.items.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.9);
    }
}
