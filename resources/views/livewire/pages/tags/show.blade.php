<div>
    <div>
        <h1>Тег: {{ $tag->name }}</h1>

        <ol>
            @foreach($articles as $article)
                <li>
                    <a href="{{ route('pages.items.show', $article) }}">
                        {{ $article->heading }}
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</div>
