<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <iframe srcdoc="{{ $getRecord()->body }}" frameborder="0" style="width: 100%;height: 500px"></iframe>
    </div>
</x-dynamic-component>
