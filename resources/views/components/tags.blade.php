<?php
/**
 * @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 */
?>
@foreach($tags as $tag)
    <span class="mb-4 inline-block rounded-full px-2 py-1 font-body text-sm {{ $tag->getClass() }}">
        <a href="{{ route('pages.tags.show', $tag) }}"
           class="no-underline text-slate-800 hover:text-slate-800 visited:text-slate-800">
            {{ $tag->name }}
        </a>
    </span>
@endforeach
