<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Група знань "{{ $knowledgeEntityGroup->name }}". Одиниця знань "{{ $knowledgeEntity->name }}"
        </h2>
    </x-slot>
    @switch($knowledgeEntity->type)
        @case(\App\Models\Enums\KnowledgeEntityTypes::ARTICLE->value)
            @include('knowledge-entities.article')
            @break
        @case(\App\Models\Enums\KnowledgeEntityTypes::FILE->value)
            @include('knowledge-entities.file')
            @break
    @endswitch
</x-app-layout>
