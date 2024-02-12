<div>
    <h1>Все рецепты</h1>

    <div class="pt-8 lg:pt-12">
        @foreach($articles as $article)
            <div class="border-b border-grey-lighter pb-8 @if(!$loop->first) pt-10 @endif">
                @foreach($article->tags as $tag)
                    <span class="mb-4 inline-block rounded-full bg-green-light px-2 py-1 font-body text-sm text-green">
                        <a href="{{ route('pages.tags.show', $tag) }}">
                            {{ $tag->name }}
                        </a>
                    </span>
                @endforeach
                <a
                    href="{{ route('pages.items.show', $article) }}"
                    class="block font-body text-lg font-semibold text-primary transition-colors hover:text-green dark:text-white dark:hover:text-secondary"
                >{{ $article->heading }}</a>
                <div class="flex items-center pt-4">
                    <p class="pr-2 font-body font-light text-primary dark:text-white">
                        {{ $article->created_at->format('d.m.Y') }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
