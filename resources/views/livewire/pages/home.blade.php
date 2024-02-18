<div>
    <div class="container mx-auto">
        <div class="border-b border-grey-lighter py-16 lg:py-20">
            <div class="flex items-center pb-6">
                <img src="/assets/img/icon-story.png" alt="icon story"/>
                <h3 class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white">
                    О проекте
                </h3>
            </div>
            <div>
                <div class="font-body font-light text-primary dark:text-white">
                    {!! $about !!}
                </div>
            </div>
        </div>

        @if($articles->isNotEmpty())
            <div class="py-16 lg:py-20">
                <div class="flex items-center pb-6">
                    <img src="/assets/img/icon-story.png" alt="icon story"/>
                    <h3
                        class="ml-3 font-body text-2xl font-semibold text-primary dark:text-white"
                    >
                        Последние добавления
                    </h3>
                    <a
                        href="{{ route('pages.items.index') }}"
                        class="flex items-center pl-10 font-body italic text-green transition-colors hover:text-secondary dark:text-green-light dark:hover:text-secondary"
                    >
                        Все рецепты
                        <img
                            src="/assets/img/long-arrow-right.png"
                            class="ml-3"
                            alt="arrow right"
                        />
                    </a>
                </div>
                <div class="pt-8">
                    <x-articles :articles="$articles"/>
                </div>
            </div>
        @endif
    </div>
</div>
