<div>
    <div class="pt-16 lg:pt-20">
        <div class="border-b border-grey-lighter pb-8 sm:pb-12">
            @if($article->tags->count())
                <div>
                    <x-tags :tags="$article->tags"/>
                </div>
            @endif
            <div class="flex items-center pt-2">
                <p class="pr-2 font-body font-light text-primary dark:text-white">
                    {{ $article->created_at->format('d.m.Y') }}
                </p>
            </div>
        </div>

        <div class="prose prose max-w-none border-b border-grey-lighter py-8 dark:prose-dark sm:py-12">
            {{ $article->content }}
        </div>

        <div class="flex items-center pt-16 lg:pt-20">
            <span class="pr-5 font-body font-medium text-primary dark:text-white">Share</span>
            <a href="/">
                <i class="bx bxl-facebook text-2xl text-primary transition-colors hover:text-secondary dark:text-white dark:hover:text-secondary"></i>
            </a>
            <a href="/">
                <i class="bx bxl-twitter pl-2 text-2xl text-primary transition-colors hover:text-secondary dark:text-white dark:hover:text-secondary"></i>
            </a>
            <a href="/">
                <i class="bx bxl-linkedin pl-2 text-2xl text-primary transition-colors hover:text-secondary dark:text-white dark:hover:text-secondary"></i>
            </a>
            <a href="/">
                <i class="bx bxl-reddit pl-2 text-2xl text-primary transition-colors hover:text-secondary dark:text-white dark:hover:text-secondary"></i>
            </a>
        </div>
    </div>
</div>
