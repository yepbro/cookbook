<div>
    <div>
        <h1>{{ $article->heading }}</h1>

        @if($article->tags->count())
            <div>
                Теги:
                @foreach($article->tags as $tag)
                    <a href="{{ route('pages.tags.show', $tag) }}">{{ $tag->name }}</a>@if(!$loop->last)
                        ,
                    @endif
                @endforeach
            </div>
        @endif

        {!! $article->content !!}
    </div>
</div>
