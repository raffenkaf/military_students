<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Створення нового учбового матеріалу в групі сутностей "{{ $knowledgeEntityGroup->name }}"
        </h2>
    </x-slot>

    <div class="p-3" x-data="{entityType: '{{ \App\Models\Enums\KnowledgeEntityTypes::ARTICLE }}' }">
        <x-admin-form
            action="{{ route('admin.knowledge-entity-group.knowledge-entity.store', ['knowledgeEntityGroup' => $knowledgeEntityGroup]) }}"
            method="POST"
            route-back="{{ route('admin.knowledge-entity-groups') }}"
            enctype="multipart/form-data"
        >
            <div class="flex flex-col">
                <label for="name" class="p-1">Назва матеріалу</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="p-1 border-2 border-gray-200 rounded-2xl" value="{{ old('name') }}"
                    required
                >
                @error('name')
                <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="type" class="p-1">Тип матеріалу</label>
                <select name="type" id="type" x-model="entityType">
                    <option value="{{ \App\Models\Enums\KnowledgeEntityTypes::ARTICLE }}">Стаття</option>
                    <option value="{{ \App\Models\Enums\KnowledgeEntityTypes::FILE }}">Файл</option>
                </select>
                @error('type')
                <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div x-show="entityType === '{{ \App\Models\Enums\KnowledgeEntityTypes::ARTICLE }}'">
                <div class="flex flex-col">
                    <label for="content" class="p-1">Зміст матеріалу</label>
                    <textarea
                        name="content"
                        id="content"
                        class="p-1 border-2 border-gray-200 rounded-2xl"
                        :required="entityType === '{{ \App\Models\Enums\KnowledgeEntityTypes::ARTICLE }}'"
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div x-show="entityType === '{{ \App\Models\Enums\KnowledgeEntityTypes::FILE }}'">
                <div class="flex flex-col">
                    <label for="file" class="p-1">Матеріал у вигляді файлу</label>
                    <input
                        type="file"
                        name="current_file"
                        id="current_file"
                        class="p-1 border-2 border-gray-200 rounded-2xl"
                        :required="entityType === '{{ \App\Models\Enums\KnowledgeEntityTypes::FILE }}'"
                    >
                    @error('current_file')
                        <div class="text-red-400 ml-2 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </x-admin-form>
    </div>
</x-admin-layout>
