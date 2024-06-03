<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Групи знань
        </h2>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 flex">
        @foreach($knowledgeEntityGroups as $knowledgeEntityGroup)
            <div
                class="ml-5 bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 w-40 h-50 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-bold">{{ $knowledgeEntityGroup->name }}</h3>
                    <p>{{ $knowledgeEntityGroup->description }}</p>
                </div>
                <div>
                    <a href="{{ route('knowledge-entity-group', $knowledgeEntityGroup) }}" class="text-blue-500">
                        Read more
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
