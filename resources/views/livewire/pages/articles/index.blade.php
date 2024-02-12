<div>
    <div>
        <h1>Все рецепты</h1>

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
