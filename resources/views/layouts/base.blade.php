<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
    <meta
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        name="viewport"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link crossorigin="anonymous" href="https://fonts.gstatic.com" rel="preconnect"/>

    <link
        as="style"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="preload"
    />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body
    x-data="{isMobileMenuOpen: false}"
    :class="isMobileMenuOpen ? 'max-h-screen overflow-hidden relative' : ''"
>

<header class="container mx-auto">
    <div class="flex items-center justify-between py-6 lg:py-10">
        <a href="{{ route('pages.home') }}" class="flex items-center">
                <span class="mr-2">
                    <img src="/assets/img/logo.svg" alt="logo"/>
                </span>
            <p class="hidden font-body text-2xl font-bold text-primary dark:text-white lg:block">
                COOKBOOK
            </p>
        </a>
        <div class="flex items-center lg:hidden">
            <i
                class="bx mr-8 cursor-pointer text-3xl text-primary dark:text-white"
                @click="themeSwitch()"
                :class="isDarkMode ? 'bxs-sun' : 'bxs-moon'"
            ></i>

            <svg
                width="24"
                height="15"
                xmlns="http://www.w3.org/2000/svg"
                @click="isMobileMenuOpen = true"
                class="fill-current text-primary dark:text-white"
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
                        class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"
                    >Все теги</a
                    >
                </li>

                <li class="group relative mr-6 mb-1">
                    <div
                        class="absolute left-0 bottom-0 z-20 h-0 w-full opacity-75 transition-all group-hover:h-2 group-hover:bg-yellow"
                    ></div>
                    <a
                        href="#"
                        class="relative z-30 block px-2 font-body text-lg font-medium text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"
                    >Все рецепты</a
                    >
                </li>
            </ul>
        </div>
    </div>
</header>

<main>
    {{ $slot }}
</main>

<footer class="container mx-auto">
    <div class="flex flex-col items-center justify-between border-t border-grey-lighter py-10 sm:flex-row sm:py-12">
        <div class="mr-auto flex flex-col items-center sm:flex-row">
            <a href="/" class="mr-auto sm:mr-6">
                <img src="/assets/img/logo.svg" alt="logo"/>
            </a>
            <p class="pt-5 font-body font-light text-primary dark:text-white sm:pt-0">
                ©2020 John Doe.
            </p>
        </div>
        <div class="mr-auto flex items-center pt-5 sm:mr-0 sm:pt-0">

        </div>
    </div>
</footer>

@livewireScripts
</body>
</html>
