<div>
    <div class="pt-16 lg:pt-20">
        <x-articles :articles="$articles"/>
    </div>

    <div class="flex pt-8 lg:pt-16">
        {{ $articles->links('atlas-paginator') }}
    </div>
</div>
