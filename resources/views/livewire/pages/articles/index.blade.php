<div>
    <div class="pt-8 lg:pt-12">
        <x-articles :articles="$articles"/>
    </div>

    <div class="flex pt-8 lg:pt-16">
        {{ $articles->links('atlas-paginator') }}
    </div>
</div>
