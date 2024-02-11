<?php
/**
 * @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tag
 */
?>
<div>
    <div>
        <h1>Все теги</h1>

        <ol>
            @foreach($tags as $tag)
                <li>
                    <a href="{{ route('pages.tags.show', $tag) }}">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div>
