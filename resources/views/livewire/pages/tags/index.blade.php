<div class="pt-16 lg:pt-20">
    <ul class="list-disc list-inside">
        @foreach($tags as $tag)
            <li class="mb-4">
                <a href="{{ route('pages.tags.show', $tag) }}" class="link">
                    {{ $tag->name }} ({{ $tag->articles_count }})
                </a>
            </li>
        @endforeach
    </ul>
</div>
