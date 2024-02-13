<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Database\Eloquent\Collection;

class SiteSettingService
{
    /**
     * @var Collection<int, SiteSetting>
     */
    protected Collection $items;

    /**
     * @param Collection $items
     */
    public function __construct(Collection $items)
    {
        $this->items = $items;
    }

    public function get(string $key): string|int|float|bool|null
    {
        return $this->items->first(fn(SiteSetting $x) => $x->key === $key)?->value;
    }

    public function getLogo(): string
    {
        return $this->get('logo');
    }

    public function getHeadCode(): string
    {
        return $this->get('head');
    }

    public function getFooterCode(): string
    {
        return $this->get('footer');
    }

    public function getRobotsTxt(): string
    {
        return $this->get('robots.txt');
    }

    public function getEmail(): string
    {
        return $this->get('email');
    }
}
