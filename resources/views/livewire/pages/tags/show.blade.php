<div>
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
