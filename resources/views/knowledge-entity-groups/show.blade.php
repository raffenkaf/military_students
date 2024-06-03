<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Група знань "{{ $knowledgeEntityGroup->name }}"
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 flex">
        @foreach($knowledgeEntityGroup->knowledgeEntities as $knowledgeEntity)
            <div
                class="ml-5 bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 w-40 h-50 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold">{{ $knowledgeEntity->name }}</h3>
                    <p>{{ $knowledgeEntity->description }}</p>
                </div>
                <div>
                    <a href="{{ route('show-knowledge-entity', ['knowledgeEntityGroup' => $knowledgeEntityGroup, 'knowledgeEntity' => $knowledgeEntity]) }}" class="text-blue-500">
                        Read more
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
