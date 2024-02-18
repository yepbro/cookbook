<div>
    <div class="pt-16 lg:pt-20">
        Запрос: {{ $search }}.

        @if($tags->isNotEmpty())
            Теги:
            <x-tags :tags="$tags"/>
        @endif

        Найдено: {{ $articles->total() }}.
    </div>

    <div class="pt-8 lg:pt-16">
        <x-articles :articles="$articles"/>
    </div>

    <div class="flex pt-8 lg:pt-16">
        {{ $articles->links('atlas-paginator') }}
    </div>
</div>
