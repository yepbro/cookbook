<?php
/**
 * @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\Article> $articles
 */
?>
@foreach($articles as $article)
    <div class="border-b border-grey-lighter pb-8 @if(!$loop->first) pt-10 @endif">
        <div>
            <x-tags :tags="$article->tags"/>
        </div>
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
