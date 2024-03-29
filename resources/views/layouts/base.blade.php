<?php
/**
 * @var \App\Services\SiteSettingService $settings
 */
?>
@inject('settings', 'App\Services\SiteSettingService')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(!$seo->og_off) prefix="og: //ogp.me/ns#" @endif>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        name="viewport"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @if($title = $seo->title ?: $header)
            {{ $title }} |
        @endif
        {{ config('app.name', 'Laravel') }}
    </title>

    @if($seo->keywords)
        <meta name="keywords" content="{{ $seo->keywords }}"/>
    @endif

    @if($seo->description)
        <meta name="description" content="{{ $seo->description }}"/>
    @endif

    <meta name="robots"
          content="{{ $seo->noindex ? 'noindex' : 'index' }},{{ $seo->nofollow ? 'nofollow' : 'follow' }}"/>

    @if (!$seo->og_off)
        <meta property="og:title" content="{{ $seo->og_title ?: $seo->title ?: $header }}"/>

        <meta property="og:type" content="{{ $seo->og_type ?: 'website' }}"/>

        <meta property="og:image"
              content="{{ $seo->og_image ?: og_image(Route::getCurrentRequest()->fullUrl(), Route::getCurrentRequest()->header('X-Browser-Shot')) }}"/>
        <meta property="og:image:width" content="1200"/>
        <meta property="og:image:height" content="630"/>

        <meta property="og:url" content="{{ $seo->og_url ?: Route::getCurrentRequest()->fullUrl() }}"/>

        @if($seo->og_description || $seo->description)
            <meta property="og:description" content="{{ $seo->og_description ?: $seo->description }}"/>
        @endif

        <meta property="og:site_name" content="{{ $seo->og_site_name ?: config('app.name', 'Laravel') }}"/>
    @endif

    @foreach($seo->metaTags as $metaTag)
        @if($metaTag->content)
            <meta {{ $metaTag->type->value }}="{{ $metaTag->name }}" content="{{ $metaTag->content }}"/>
        @endif
    @endforeach

    <x-feed-links/>

    <link crossorigin="anonymous" href="https://fonts.googleapis.com" rel="preconnect"/>

    <link
        as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="preload"
    />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />

    {!! $settings->getHeadCode() !!}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body
    x-data="{isMobileMenuOpen: false}"
    :class="isMobileMenuOpen ? 'max-h-screen overflow-x-hidden overflow-y-scroll relative' : ''"
>

<header class="container mx-auto">
    <div class="flex items-center justify-between py-6 lg:py-10">
        <a href="{{ route('pages.home') }}" class="flex items-center no-underline">
                <span class="mr-2">
                    @if($logo = $settings->getLogo())
                        {!! $logo !!}
                    @else
                        <img src="/assets/img/logo.svg" alt="logo"/>
                    @endif
                </span>
            <p class="hidden font-body text-2xl font-bold text-primary lg:block">
                {{ config('app.name') }}
            </p>
        </a>
        <div class="flex items-center lg:hidden">
            <svg
                width="24"
                height="15"
                xmlns="http://www.w3.org/2000/svg"
                @click="isMobileMenuOpen = true"
                class="fill-current text-primary"
            >
                <g fill-rule="evenodd">
                    <rect width="24" height="3" rx="1.5"/>
                    <rect x="8" y="6" width="16" height="3" rx="1.5"/>
                    <rect x="4" y="12" width="20" height="3" rx="1.5"/>
                </g>
            </svg>
        </div>
        <div class="hidden lg:block">
            <ul class="flex items-center">

                <li class="group relative mr-6 mb-1">
                    <div
                        class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                    ></div>
                    <a
                        href="{{ route('pages.tags.index') }}"
                        @class([
    'active' => Route::is('pages.tags.index'),
    'relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green  no-underline',
])
                    >Все теги</a
                    >
                </li>

                <li class="group relative mr-6 mb-1">
                    <div
                        class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                    ></div>
                    <a
                        href="{{ route('pages.items.index') }}"
                        @class([
    'active' => Route::is('pages.items.index'),
    'relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green  no-underline',
])
                    >Все рецепты</a
                    >
                </li>
            </ul>
        </div>

        <div
            class="pointer-events-none fixed inset-0 z-50 flex bg-black bg-opacity-80 opacity-0 transition-opacity lg:hidden"
            :class="isMobileMenuOpen ? 'opacity-100 pointer-events-auto' : ''"
        >
            <div class="ml-auto w-2/3 bg-green p-4 md:w-1/3">
                <box-icon class="absolute top-0 right-0 mt-4 mr-4 text-4xl text-white"
                          name="x" @click="isMobileMenuOpen = false"></box-icon>
                <ul class="mt-8 flex flex-col">

                    <li class="">
                        <a
                            href="{{ route('pages.tags.index') }}"
                            class="mb-3 block px-2 font-body text-lg font-medium text-white visited:text-white hover:text-secondary"
                        >Все теги</a
                        >
                    </li>

                    <li class="">
                        <a
                            href="{{ route('pages.items.index') }}"
                            class="mb-3 block px-2 font-body text-lg font-medium text-white visited:text-white hover:text-secondary"
                        >Все рецепты</a
                        >
                    </li>

                    @foreach($footerLinks as $link)
                        <li class="">
                            <a
                                href="{{ route('pages.pages.show', $link) }}"
                                class="mb-3 block px-2 font-body text-lg font-medium text-white visited:text-white hover:text-secondary"
                            >{{ $link->name }}</a
                            >
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    <div>
        <form action="{{ route('pages.search') }}" class="flex align-center justify-center">
            <select name="tag" class="search mr-2 w-2/5 focus:border-slate-100" title="Теги">
                <option value="">Все теги</option>
                @foreach($tags as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <input type="search" name="q" class="search w-3/5 focus:border-slate-100" title="Поиск"/>
            <button class="btn-search">
                <box-icon name="search"></box-icon>
            </button>
        </form>
    </div>
</header>

<main class="pb-16 lg:pb-20">
    <div class="container mx-auto">

        @if($heading = $seo->header ?: $header)
            <h1 class="pt-5 font-body text-4xl font-semibold text-primary md:text-5xl lg:text-6xl">
                {{ $heading }}
            </h1>
        @endif

        @if($textBefore = $seo->text_before ?: '')
            <div class="pt-3 sm:w-3/4">
                <p class="font-body text-xl font-light text-primary">
                    {{ $textBefore }}
                </p>
            </div>
        @endif

        {{ $slot }}

        @if($textAfter = $seo->text_after ?: '')
            <div class="pt-3 sm:w-3/4">
                <p class="font-body text-xl font-light text-primary">
                    {{ $textAfter }}
                </p>
            </div>
        @endif

    </div>
</main>

<footer class="container mx-auto">
    <div class="flex flex-col items-center justify-between border-t border-grey-lighter py-10 sm:flex-row sm:py-12">
        <div class="mr-auto flex flex-col items-center sm:flex-row">
            <a href="/" class="mr-auto sm:mr-6">
                @if($logo = $settings->getLogo())
                    {!! $logo !!}
                @else
                    <img src="/assets/img/logo.svg" alt="logo"/>
                @endif
            </a>
            <p class="pt-5 font-body font-light text-primary sm:pt-0">
                ©{{ config('app.from_year') }}
                @if(config('app.from_year') !== date('Y'))
                    — date('Y')
                @endif
                {{ config('app.name') }}
            </p>
        </div>
        <div class="mr-auto footer-menu pt-5 sm:mr-0 sm:pt-0">
            @foreach($footerLinks as $link)
                <div class="text-right">
                    <a href="{{ route('pages.pages.show', $link) }}" @class([
    'active' => Route::is('pages.pages.show') && request()->route()->originalParameter('page') === $link->slug,
])>{{ $link->name }}</a>
                </div>

            @endforeach
        </div>
    </div>
</footer>

{!! $settings->getFooterCode() !!}

<script>
    function ready() {
        hljs.highlightAll()
    }

    document.addEventListener("DOMContentLoaded", ready);
</script>

@livewireScripts
</body>
</html>
