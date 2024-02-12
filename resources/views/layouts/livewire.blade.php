<x-base-layout
    :header="$header ?? ''"
    :desc="$desc ?? ''"
    :title="$header ?? ''"
>
    {{ $slot }}
</x-base-layout>
